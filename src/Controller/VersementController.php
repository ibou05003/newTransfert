<?php

namespace App\Controller;

use App\Entity\Versement;
use App\Form\VersementType;
use App\Repository\VersementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * @Route("api/versement")
 * @Security("has_role('ROLE_Caissier')")
 */
class VersementController extends FOSRestController
{
    /**
     * @Route("/", name="versement_index", methods={"GET"})
     */
    public function index(VersementRepository $versementRepository): Response
    {
        $versements=$versementRepository->findAll();
        return $this->handleView($this->view($versements));
    }

    /**
     * @Route("/ajout", name="versement_ajout", methods={"GET","POST"})
     */
    public function new(ValidatorInterface $validator, Request $request): Response
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
        if(!$versement->getCompte()){
            return $this->handleView($this->view(['erreur'=>'ce compte n\'existe pas'],Response::HTTP_UNAUTHORIZED));
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $versement->setDateVersement(new \Datetime);
            $versement->setCaissier("1");

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
     * @Route("/{id}", name="versement_show", methods={"GET"})
     */
    public function show(Versement $versement): Response
    {
        return $this->handleView($this->view($versement));
    }
}
