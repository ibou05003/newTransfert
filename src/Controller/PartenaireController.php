<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Repository\PartenaireRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Compte;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
* @Route("/api/partenaire")
*/
class PartenaireController extends AbstractFOSRestController
{
    /**
     * @Route("/", name="partenaire_index", methods={"GET"})
     */
    public function index(PartenaireRepository $partenaireRepository): Response
    {
        return $this->render('partenaire/index.html.twig', [
            'partenaires' => $partenaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ajout", name="partenaire_ajout", methods={"GET","POST"})
     */
    public function new(ValidatorInterface $validator, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $partenaire = new Partenaire();
        $user = new User();
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $form->handleRequest($request);
        $data=json_decode($request->getContent(),true);

        $user->setImageName("null");
        if(!$data){
            $data=$request->request->all(); 
            $file=$request->files->all()['imageFile'];
            $user->setImageFile($file);
        }

        $form->submit($data);
        $errors = $validator->validate($partenaire);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partenaire);
            $entityManager->flush();
            //creation compte
            $compte= new Compte();
            $compte->setPartenaire($partenaire);
            $compte->setCreatedAt(new \Datetime());
            $compte->setSolde(0);
            $compte->setNumeroCompte("000".date("d").date("m").date("Y").date("H").date("i").date("s"));
            
            //creation user
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,'passer'
                )
            );
            $user->setEmail($partenaire->getEmailPersonneRef());
            $user->setRoles(['ROLE_SuperAdminPartenaire']);
            $user->setCompte($compte->getNumeroCompte());
            $proprietaire=$partenaire->getId()."";
            $user->setProprietaire($proprietaire);
            $user->setNombreConnexion(0);
            $user->setStatus('Actif');

            
            
            $entityManager->persist($user);
            $entityManager->persist($compte);
            $entityManager->flush();

            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * @Route("/{id}", name="partenaire_show", methods={"GET"})
     */
    public function show(Partenaire $partenaire): Response
    {
        return $this->render('partenaire/show.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="partenaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Partenaire $partenaire): Response
    {
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partenaire_index');
        }

        return $this->render('partenaire/edit.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="partenaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Partenaire $partenaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partenaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($partenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('partenaire_index');
    }
}
