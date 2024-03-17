<?php

namespace App\Form;

use App\Entity\Examns;
use App\Entity\ExamnsType;
use App\Entity\Season;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class _ExamnsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('score')
            ->add('score_pass')
            ->add('isActive')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('createdBy')
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedBy')
            ->add('examnsType', EntityType::class, [
                'class' => self::class,
                'choice_label' => 'id',
            ])
            ->add('season', EntityType::class, [
                'class' => Season::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Examns::class,
        ]);
    }
}
