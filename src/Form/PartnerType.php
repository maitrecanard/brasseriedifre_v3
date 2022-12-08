<?php

namespace App\Form;

use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('description', TextType::class, [
            ])
            ->add('adress', TextType::class, [
                'label' => 'Adresses'
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone'
            ])
            ->add('url', UrlType::class, [
                'label' => 'Site internet'
            ])
            ->add('active', ChoiceType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Publié',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ]
        ]);
    }
}
