<?php

namespace App\Form;

use App\Entity\IncubateurUtilise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IncubateurUtiliseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('productionId')
            ->add('numChariot')
            ->add('qteOeuf')
            ->add('machine')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => IncubateurUtilise::class,
        ]);
    }
}
