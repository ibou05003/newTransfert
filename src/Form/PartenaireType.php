<?php

namespace App\Form;

use App\Entity\Partenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raisonSociale')
            ->add('ninea')
            ->add('adresseSociale')
            ->add('telephoneSiege')
            ->add('description')
            ->add('nomCompletPersonneRef')
            ->add('emailPersonneRef')
            ->add('emailSiege')
            ->add('telephoneRef')
            ->add('cniPersonneRef')
            ->add('adressePersonneRef')
            ->add('imageFile',VichImageType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partenaire::class,
            'csrf_protection'=>false
        ]);
    }
}
