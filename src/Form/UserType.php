<?php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Security\Core\Security;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // grab the user, do a quick sanity check that one exists
        $user = $this->security->getUser();
        if($user->getRoles()[0]=='ROLE_SuperAdminWari' || $user->getRoles()[0]=='ROLE_AdminWari'){
            $builder->add('role',ChoiceType::class, [
                'choices'  => [
                    'Administrateur' => 1,
                    'Caissier' => 2
                ]
            ]);
        }else{
            $builder->add('role',ChoiceType::class, [
                'choices'  => [
                    'Administrateur' => 3,
                    'Utilisateur' => 4
                ]
            ]);
        }
        $builder
            ->add('email')
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'le mot de passe doit avoir au mois {{ limit }} caracteres',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('imageFile',VichImageType::class)
            ->add('nomComplet')
            ->add('cni')
            ->add('telephone')
            ->add('adresse')
            // ->add('role',ChoiceType::class, [
            //     'choices'  => [
            //         'Administrateur' => 1,
            //         'Caissier' => 2,
            //         'Administrateur Partenaire' => 3,
            //         'Utilisateur' => 4
            //     ]
            // ])
        ;
        
       
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection'=>false
        ]);
    }
}