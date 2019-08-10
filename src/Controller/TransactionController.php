<?php

namespace App\Controller;

use App\Entity\Transaction;
use App\Form\TransactionType;
use App\Repository\TransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\TarifsRepository;
use FOS\RestBundle\Controller\FOSRestController;
use App\Form\RetraitType;

/**
 * @Route("/api/transaction")
 */
class TransactionController extends FOSRestController
{
    /**
     * @Route("/", name="transaction_index", methods={"GET"})
     */
    public function index(TransactionRepository $transactionRepository): Response
    {
        $transactions=$transactionRepository->findAll();
        return $this->handleView($this->view($transactions));
    }

    /**
     * @Route("/envoi", name="transaction_envoi", methods={"GET","POST"})
     */
    public function new(ValidatorInterface $validator,Request $request,TarifsRepository $tar): Response
    {
        $transaction = new Transaction();
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        $data=json_decode($request->getContent(),true);
        $form->submit($data);
        $errors = $validator->validate($transaction);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        $connecte = $this->getUser();
        $compte=$connecte->getCompte();

        if ($transaction->getMontant() > $compte->getSolde()){
            return $this->handleView($this->view(['erreur montant'=>'le montant que vous essayez d envoyer n est pas disponible'],Response::HTTP_UNAUTHORIZED));
        }

        //if ($form->isSubmitted() && $form->isValid()) {

            

            $frais=$tar->findFrais($transaction->getMontant());

            $transaction->setCode(date("d").date("m").date("Y").date("H").date("i").date("s"));
            $transaction->setDateEnv(new \Datetime());
            $transaction->setStatus('Disponible');
            $transaction->setFrais($frais[0]->getValeur());

            /*Calculs frais */
            $val=$transaction->getFrais();
            $transaction->setCommissionEnv(10*$val/100);
            $transaction->setCommissionRet(20*$val/100);
            $transaction->setCommissionPropre(40*$val/100);
            $transaction->setTaxe(30*$val/100);

            $transaction->setUser($connecte);
            
            $transaction->setCompteEnv($compte);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transaction);
            $entityManager->flush();

            $compte->setSolde($compte->getSolde()-$transaction->getMontant()+$transaction->getCommissionEnv());

            $entityManager->persist($compte);
            $entityManager->flush();

            
            

            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
       // }

        //return $this->handleView($this->view(['erreur'=>'erreur'],Response::HTTP_UNAUTHORIZED));
    }

    /**
    * @Route("/retrait/{code}", name="transaction_retrait", methods={"GET","POST"})
    */
    public function retrait(Transaction $transaction, ValidatorInterface $validator,Request $request): Response
    {
        if(!$transaction){
            return $this->handleView($this->view(['erreur code'=>'le code est invalide'],Response::HTTP_UNAUTHORIZED));
        }
        $form = $this->createForm(RetraitType::class, $transaction);
        $form->handleRequest($request);

        $data=json_decode($request->getContent(),true);
        $form->submit($data);
        $errors = $validator->validate($transaction);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        $connecte = $this->getUser();
        $compte=$connecte->getCompte();

        //if ($form->isSubmitted() && $form->isValid()) {

            $type=$form->get('typeRetrait')->getData();


            $transaction->setDateRet(new \Datetime());
            if($type=='retrait'){
                $transaction->setStatus('Retiré');
            }elseif($type=='remboursement'){
                $transaction->setStatus('Remboursé');
            }else{
                return $this->handleView($this->view(['erreur'=>'choisir remboursement ou retrait'],Response::HTTP_UNAUTHORIZED));
            }
            


            $transaction->setUserRet($connecte);
            
            $transaction->setCompteRet($compte);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transaction);
            $entityManager->flush();

            $compte->setSolde($compte->getSolde()+$transaction->getMontant()+$transaction->getCommissionRet());

            $entityManager->persist($compte);
            $entityManager->flush();

            
            

            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
    // }

        //return $this->handleView($this->view(['erreur'=>'erreur'],Response::HTTP_UNAUTHORIZED));
    }

    /**
     * @Route("/{id}", name="transaction_show", methods={"GET"})
     */
    public function show(Transaction $transaction): Response
    {
        return $this->handleView($this->view($transaction));
    }
}
