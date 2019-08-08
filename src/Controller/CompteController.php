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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Partenaire;
use App\Repository\VersementRepository;
use App\Entity\Versement;
use App\Form\VersementType;

/**
 * @Route("/api")
 */
class CompteController extends FOSRestController
{
    /**
     * @Route("/compte/", name="compte_index", methods={"GET"})
     * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminWari')")
     */
    public function index(CompteRepository $compteRepository): Response
    {
        $comptes=$compteRepository->findAll();
        return $this->handleView($this->view($comptes));
    }
    /**
    * @Route("/compte/trouve", name="compte_trouve", methods={"GET"})
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminWari')")
    */
    public function recherche(CompteRepository $compteRepository,int $numeroCompte): Response
    {
        $comptes=$compteRepository->findBy($numeroCompte);
        return $this->handleView($this->view($comptes));
    }

    /**
     * @Route("/compte/ajout/{id}", name="compte_ajout", methods={"GET","POST"})
     * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminWari')")
     */
    public function new(Partenaire $partenaire): Response
    {
        $compte = new Compte();
        
        if(!$partenaire){
            return $this->handleView($this->view(['erreur'=>'ce partenaire n\'existe pas'],Response::HTTP_UNAUTHORIZED));
        }
            $compte->setPartenaire($partenaire);
            $compte->setCreatedAt(new \Datetime());
            $compte->setSolde(0);
            $compte->setNumeroCompte("000".date("d").date("m").date("Y").date("H").date("i").date("s"));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compte);
            $entityManager->flush();

            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));

    }

    /**
     * @Route("/compte/{id}", name="compte_show", methods={"GET"})
     * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminWari')")
     */
    public function show(Compte $compte): Response
    {
        return $this->handleView($this->view($compte));
    }
    /**
    * @Route("/versement/", name="versement_index", methods={"GET"})
    * @Security("has_role('ROLE_Caissier')")
    */
    public function indexVersement(VersementRepository $versementRepository): Response
    {
        $versements=$versementRepository->findAll();
        return $this->handleView($this->view($versements));
    }

    /**
    * @Route("/versement/ajout/{id}", name="versement_ajout", methods={"GET","POST"})
    * @Security("has_role('ROLE_Caissier')")
    */
    public function newVersement(ValidatorInterface $validator, Request $request,Compte $compte): Response
    {
        $versement = new Versement();
        $form = $this->createForm(VersementType::class, $versement);
        $form->handleRequest($request);

        $data=json_decode($request->getContent(),true);
        $form->submit($data);
        $errors = $validator->validate($versement);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        if(!$compte){
            return $this->handleView($this->view(['erreur'=>'ce compte n\'existe pas'],Response::HTTP_UNAUTHORIZED));
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $versement->setCompte($compte);
            $versement->setDateVersement(new \Datetime());
            $connecte = $this->getUser();
            $versement->setUser($connecte);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($versement);
            $entityManager->flush();

            $compte=$versement->getCompte();
            $compte->setSolde($compte->getSolde()+$versement->getMontant());
            $entityManager->persist($compte);
            $entityManager->flush();

            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }
    }

    /**
    * @Route("/versement/{id}", name="versement_show", methods={"GET"})
    * @Security("has_role('ROLE_Caissier')")
    */
    public function showVersement(Versement $versement): Response
    {
        return $this->handleView($this->view($versement));
    }
}
