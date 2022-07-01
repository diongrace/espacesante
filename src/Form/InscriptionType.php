<?php

namespace App\Form;

use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'nom'
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'prenom'
            ])
            ->add('profession', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'profession'
            ])
            ->add('telephone', NumberType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'telephone'
            ])
            ->add('genre', ChoiceType::class, [
                'choices'  => [
                    'choisir' => 'genre',
                     'homme' => 'homme',
                     'femme' => 'femme', 
                       
                       ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'genre'
            ])
            ->add('ville', ChoiceType::class, [
                'choices'  => [
                    'choisir' => 'ville',
                     'Man' => 'Man',
                     'Abidjan' => 'Abidjan', 
                       
                       ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'ville'
            ])
            ->add('region', ChoiceType::class, [
                'choices'  => [
                    'choisir' => 'region',
                     'Sassandra' => 'Sassandra',
                     'Lame' => 'Lame', 
                       
                       ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'region'
            ])
            ->add('pays', ChoiceType::class, [
                'choices'  => [
                    'choisir' => 'region',
                     'Mali' => 'Mali',
                     'France' => 'France', 
                     'CôteIvoire' => 'CôteIvoire', 
                       ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'pays'
            ])
            ->add('dateNaissance', DateType::class, [
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'dateNaissance' 
            ])

            ->add('numeroCNI', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'numeroCNI'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
