<?php

namespace App\Form;

use App\Entity\Answers;
use App\Entity\Questions;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('answer')
            ->add('question_image')
            ->add('question_audio')
            ->add('correct')
            ->add('question_answer', EntityType::class, [
                'class' => Questions::class,
                'choice_label' => 'question',
            ])
            ->add('isActive', HiddenType::class, ['data' => true,]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Answers::class,
        ]);
    }
}
