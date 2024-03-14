<?php

namespace App\Form;

use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class SeasonType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('name', null,)
      ->add('season_year', null,)
      ->add('description', null,)
      ->add('image', null,)
      ->add('isActive', HiddenType::class, ['data' => true,])
      ->add('createdBy', HiddenType::class,)
      ->add('updatedBy', HiddenType::class,);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Season::class,
    ]);
  }
}
