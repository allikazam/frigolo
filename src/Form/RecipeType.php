<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TypeTextType::class, [
                'attr'=> [
                    'class' => 'form-control'
                ], 
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('tag', TypeTextType::class, [
                'attr'=> [
                    'class' => 'form-control'
                ], 
                'label' => 'Tag',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('ingredients', EntityType::class, [
                'class'     => Ingredient::class,
                'expanded'  => true,
                'multiple'  => true,
                // 'entry_type' => IngredientType::class, 
                // 'entry_options' => ['label' => false],
                'attr'=> [
                    'class' => 'form-control'
                ], 
                'label' => 'Ingrédients',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
