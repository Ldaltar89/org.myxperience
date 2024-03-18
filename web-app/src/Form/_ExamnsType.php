<?php

namespace App\Form;

use App\Entity\Examns;
use App\Entity\ExamnsType;
use App\Entity\Season;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class _ExamnsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('score')
            ->add('score_pass')
            ->add('examns_type', EntityType::class, [
                'class' => ExamnsType::class,
                'choice_label' => 'name',
            ])
            ->add('season', EntityType::class, [
                'class' => Season::class,
                'choice_label' => 'name',
            ])
            ->add('isActive', HiddenType::class, ['data' => true,]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Examns::class,
        ]);
    }
}
