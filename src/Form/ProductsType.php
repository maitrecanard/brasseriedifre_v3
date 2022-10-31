<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Products;
use App\Entity\Prix;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;


class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('subtitle', TextType::class, [
                'label' => 'Sous titre',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            
            ->add('categorie', EntityType::class, [
                'class' => Categories::class,
                'choice_label' => 'name',
                
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('degre', NumberType::class, [
                'label' => 'Alcool' 
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu'
            ])
            ->add('picture', FileType::class, [
                'label' => 'Image du produit',
                'attr' => [
                   'class' => 'form-controll'
                ],
                'row_attr' => [
                    'class' => 'form-control',
                    'value' => 'télécharger une image'
                ],
               
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '42048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png',
                            'image/bmp',
                            'image/gif'
                        ],
                        'mimeTypesMessage' => 'Merci d\'uploader uniquement une image au format PNG, JPG, BMP ou GIF !',
                    ])
                ],

            ])
            ->add('active', ChoiceType::class, [
                'label' => 'Publié',
                'attr' => [
                    'class' => 'form-control'
                ],
                'choices' => [
                    'Non' => 0,
                    'Oui' => 1
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
