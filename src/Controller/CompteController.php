<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;
use App\Repository\CompteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/compte")
 */
class CompteController extends FOSRestController
{
    /**
     * @Route("/", name="compte_index", methods={"GET"})
     */
    public function index(CompteRepository $compteRepository): Response
    {
        $comptes=$compteRepository->findAll();
        return $this->handleView($this->view($comptes));
    }

    /**
     * @Route("/ajout", name="compte_ajout", methods={"GET","POST"})
     */
    public function new(ValidatorInterface $validator, Request $request): Response
    {
        $compte = new Compte();
        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);

        $data=json_decode($request->getContent(),true);
        $form->submit($data);
        $errors = $validator->validate($compte);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        if(!$compte->getPartenaire()){
            return $this->handleView($this->view(['erreur'=>'ce partenaire n\'existe pas'],Response::HTTP_UNAUTHORIZED));
        }
        if ($form->isSubmitted() && $form->isValid()) {
            
            $compte->setCreatedAt(new \Datetime());
            $compte->setSolde(0);
            $compte->setNumeroCompte("000".date("d").date("m").date("Y").date("H").date("i").date("s"));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compte);
            $entityManager->flush();

            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }

    }

    /**
     * @Route("/{id}", name="compte_show", methods={"GET"})
     */
    public function show(Compte $compte): Response
    {
        return $this->handleView($this->view($compte));
    }

}
