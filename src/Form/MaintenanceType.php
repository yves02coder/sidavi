<?php

namespace App\Form;

use App\Entity\Maintenance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaintenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numMachine')
            ->add('verificationJour', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('etatReleve')
            ->add('commentaire')
            ->add('actionMenee')
            ->add('machine')
            ->add('prestataire')
            ->add('employe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Maintenance::class,
        ]);
    }
}
