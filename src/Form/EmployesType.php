<?php

namespace App\Form;

use App\Entity\Employes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('numero')
            ->add('civilite')
            ->add('adresse')
            ->add('fonction')
            ->add('typeContrat')
            ->add('dateDebut', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('dateFin', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
