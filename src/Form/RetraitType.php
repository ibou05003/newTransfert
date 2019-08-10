<?php

namespace App\Form;

use App\Entity\Transaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RetraitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeRetrait', ChoiceType::class, [
                'choices' => [
                    'Retrait' => 'retrait',
                    'Rembourse' => 'remboursement'
                ],
            ])
            ->add('cniBenef')
            ->add('typePieceBenef',ChoiceType::class, [
                'choices'  => [
                    'Carte Nationale d identite' => 'cni',
                    'Passport' => 'passport',
                    'Permis de Conduire' => 'permis'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
            'csrf_protection' => false,
        ]);
    }
}
