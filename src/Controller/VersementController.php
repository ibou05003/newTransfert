<?php

namespace App\Controller;

use App\Entity\Versement;
use App\Form\VersementType;
use App\Repository\VersementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * @Route("api/versement")
 */
class VersementController extends FOSRestController
{
    /**
     * @Route("/", name="versement_index", methods={"GET"})
     */
    public function index(VersementRepository $versementRepository): Response
    {
        return $this->render('versement/index.html.twig', [
            'versements' => $versementRepository->findAll(),
        ]);
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

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * @Route("/{id}", name="versement_show", methods={"GET"})
     */
    public function show(Versement $versement): Response
    {
        return $this->render('versement/show.html.twig', [
            'versement' => $versement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="versement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Versement $versement): Response
    {
        $form = $this->createForm(VersementType::class, $versement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('versement_index');
        }

        return $this->render('versement/edit.html.twig', [
            'versement' => $versement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="versement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Versement $versement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$versement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($versement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('versement_index');
    }
}
