<?php

namespace App\Form;

use App\Entity\Reception;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateReception', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('heureReception', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('qteCartonRecu')
            ->add('qteOeuf')
            ->add('chauffeur')
            ->add('mleVehicule')
            ->add('fournisseurId')
            ->add('employe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reception::class,
        ]);
    }
}
