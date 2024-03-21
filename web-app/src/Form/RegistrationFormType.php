<?php

namespace App\Form;

use App\Entity\Season;
use App\Entity\University;
use App\Entity\User;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control']])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, ['label'=>'Password',
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('isActive', HiddenType::class, ['data' => true,])
            ->add('name', TextType::class , ['attr'=> ['class' => 'form-control']])
            ->add('lastname', TextType::class , ['attr'=> ['class' => 'form-control']])
            ->add('dni', IntegerType::class , ['attr'=> ['class' => 'form-control']])
            ->add('birthday', null, [
                'widget' => 'single_text',
                'attr'=> ['class' => 'form-control']
            ])
            ->add('season', EntityType::class, [
                'class' => Season::class,
                'choice_label' => 'name',
                'placeholder' => 'Choose a Season',
                'attr'=> ['class' => 'form-control']
            ])
            ->add('university', EntityType::class, [
                'class' => University::class,
                'choice_label' => 'name',
                'placeholder' => 'Choose a University',
                'attr'=> ['class' => 'form-control']
            ])
            ->add('user_image', TextType::class , ['attr'=> ['class' => 'form-control']])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Masculine' => 'Masculine',
                    'Female' => 'Female',
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
