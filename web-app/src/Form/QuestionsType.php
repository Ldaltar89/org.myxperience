<?php

namespace App\Form;

use App\Entity\Examns;
use App\Entity\Questions;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('question')
            ->add('description')
            ->add('question_type')
            ->add('question_image')
            ->add('question_audio')
            ->add('points')
            ->add('isActive')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('createdBy')
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedBy')
            ->add('examns', EntityType::class, [
                'class' => Examns::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Questions::class,
        ]);
    }
}
