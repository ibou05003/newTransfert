<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Repository\UserRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Form\MotDePasseType;
use App\Entity\MotDePasse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * @Route("/api/users")
 */
class SecurityController extends AbstractFOSRestController
{
    private $status='Actif';
    private $plain='plainPassword';
    private $message='status';
    /**
    * @Route("/register", name="app_register")
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminPartenaire')")
    */
    public function register(ValidatorInterface $validator,Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $data=json_decode($request->getContent(),true);

        if(!$data){
            $data=$request->request->all(); 
        }

        $form->submit($data);

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        if(!$form->get($this->plain)->getData() || strlen($form->get($this->plain)->getData())<6){
            if(!$form->get($this->plain)->getData()){
                $msg='Veuillez renseigner le mot de passe';
            }
            else{
                $msg='le mot de passe doit avoir au moins 6 caractères';
            }
            return $this->handleView($this->view([$this->message=>$msg],Response::HTTP_UNAUTHORIZED));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get($this->plain)->getData()
                )
            );
            $connecte = $this->getUser();
            if($connecte->getRoles()[0]=='ROLE_AdminWari'){
                $user->setRoles(['ROLE_Caissier']);
                $user->setCompte('WARI');
                $user->setProprietaire('WARI');
            }else{
                $user->setRoles(['ROLE_USER']);
                $user->setProprietaire($connecte->getProprietaire());
                $user->setCompte($connecte->getCompte());
            }
            
            $user->setNombreConnexion(0);
            $user->setStatus($this->status);

            $file=$request->files->all()['imageFile'];
            if (! in_array($file->getMimeType(), array('image/jpeg','image/jpg','image/png'))){
                return $this->handleView($this->view([$this->message=>'choisissez une image'],Response::HTTP_UNAUTHORIZED));
            }
            
            $user->setImageFile($file);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->handleView($this->view([$this->message=>'ok'],Response::HTTP_CREATED));
        }
    }

    /**
    * @Route("/",name="users",methods={"GET"})
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminPartenaire')")
    */
    public function index(UserRepository $repo)
    {
        $users=$repo->findAll();
        return $this->handleView($this->view($users));
    }
    /**
    * @Route("/status/{id}", name="status",methods={"PUT"})
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminPartenaire')")
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
        return $this->handleView($this->view([$this->message=>'ok'],Response::HTTP_CREATED));
    }
    /**
    * @Route("/password/{id}", name="password_change",methods={"PUT"})
    * @Security("has_role('ROLE_AdminWari') or has_role('ROLE_SuperAdminPartenaire')")
    */
    public function initPassword(User $user,ValidatorInterface $validator,Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $mdp= new MotDePasse();
        $form = $this->createForm(MotDePasseType::class, $mdp);
        $form->handleRequest($request);
    
        $data=json_decode($request->getContent(),true);
        $form->submit($data);
        $errors = $validator->validate($mdp);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }
        if($form->get($this->plain)->getData()!=$form->get($this->plain.'Confirm')->getData()){
            return $this->handleView($this->view([$this->message=>'veuillez saisir les memes mots de passe'],Response::HTTP_UNAUTHORIZED));
        }
        if ($form->isSubmitted() && $form->isValid()) {
            
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get($this->plain)->getData()
                )
            );
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->handleView($this->view([$this->message=>'ok'],Response::HTTP_CREATED));
        }
    }
    /**
    * @Route("/login", name="login", methods={"POST"})
    */
    public function login(Request $request)
    {
        $user = $this->getUser();
        if($user->getStatus()==$this->status){
            $token = $this->tokenStorage->getToken();
            if ($token instanceof UsernamePasswordToken && $this->providerKey === $token->getProviderKey()) {
                $this->tokenStorage->setToken(null);
            }
            return $this->json([
                'username' => $user->getUsername(),
                'roles' => $user->getRoles()
            ]);
        }
        elseif($user->getStatus()=='Bloqué'){
            return $this->handleView($this->view([$this->message=>'Utilisateur bloqué'],Response::HTTP_UNAUTHORIZED));
        }
    }
}
