<?php

namespace App\Form;

use App\Entity\Production;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('qteTri')
            ->add('qteIncubee')
            ->add('dateIncubation', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('dateMirage', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('heureMirage', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('oeufClair')
            ->add('oeufFeconde')
            ->add('dateEclosion', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('heureEclosion', DateType::class, [
              'widget' => 'single_text',
              // this is actually the default format for single_text

            ])
            ->add('qtePoussinSortie')
            ->add('qtePoussinVendable')
            ->add('qtePoussinTri')
            ->add('etatVente')
            ->add('machine')
            ->add('reception')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Production::class,
        ]);
    }
}
