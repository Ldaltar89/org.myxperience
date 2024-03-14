<?php

namespace App\Form;

use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeasonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('season_year')
            ->add('description')
            ->add('image')
            ->add('isActive')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('createdBy')
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedBy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Season::class,
        ]);
    }
}
