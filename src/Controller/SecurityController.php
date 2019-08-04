<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api")
 */
class SecurityController extends AbstractFOSRestController
{
    private $status='Actif';
    /**
    * @Route("/register", name="app_register")
    */
    public function register(ValidatorInterface $validator,Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $data=json_decode($request->getContent(),true);
        $user->setImageName("null");
        if(!$data){
            $data=$request->request->all(); 
            $file=$request->files->all()['imageFile'];
            $user->setImageFile($file);
        }

        $form->submit($data);

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setRoles(['ROLE_AdminWari']);
            $user->setCompte('WARI');
            $user->setProprietaire('WARI');
            $user->setNombreConnexion(0);
            $user->setStatus($this->status);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
    * @Route("/users",name="users",methods={"GET"})
    */
    public function index(UserRepository $repo)
    {
        $users=$repo->findAll();
        return $this->handleView($this->view($users));
    }
    /**
    * @Route("/user/status/{id}", name="status",methods={"PUT"})
    */
    public function status(User $user)
    {
        if($user->getStatus()==$this->status){
            $user->setStatus('Bloqué');
        }else{
            $user->setStatus($this->status);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
    }
    /**
    * @Route("/user/password/{id}", name="password_change",methods={"PUT"})
    */
    public function initPassword(User $user,ValidatorInterface $validator,Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $data=json_decode($request->getContent(),true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->handleView($this->view(['status'=>'ok'],Response::HTTP_CREATED));
        }
    }
}
