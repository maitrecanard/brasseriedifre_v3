<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VerifAgeType extends AbstractType
{
    public function age(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', ChoiceType::class, [
                'choices' => [
                    $this->day
                ]
            ]);
    }

    public function configurationOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'crsf_protection' => false
        ]);
    }

    private function day()
    {
        $day = [];
        for ($i = 1; $i <=31; $i++)
        {
            $day[$i] . '=>' .$day[$i];
        }

        return $day;
    }
}