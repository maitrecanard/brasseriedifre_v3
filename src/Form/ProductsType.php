<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Prix;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('subtitle')
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            /*->add('picture', FileType::class, [
                'label' => 'Image du produit',
                [
                    'data_class' => null
                ]
            ])*/
            ->add('prix', EntityType::class, [
                'class' => Prix::class,
                'choice_label' => 'QuatitiesId',
                'mapped' => false
            ]
            )
            ->add('degre', NumberType::class, [
                'label' => 'Alcool' 
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu'
            ])
            ->add('active', ChoiceType::class, [
                'label' => 'Publié',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
