<?php

namespace App\Form;

use App\Entity\Transaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenomEnv')
            ->add('nomEnv')
            ->add('telEnv')
            ->add('montant')
            ->add('adresseEnv')
            ->add('typePieceEnv',ChoiceType::class, [
                'choices'  => [
                    'Carte Nationale d identite' => 'cni',
                    'Passport' => 'passport',
                    'Permis de Conduire' => 'permis'
                ]
            ])
            ->add('cniEnv')
            ->add('nomBenef')
            ->add('telBenef')
            ->add('prenomBenef')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
            'csrf_protection'=>false
        ]);
    }
}
