<?php

namespace App\Form;

use App\Entity\HistoriqueHospitalisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HistoriqueHospitalisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('patient',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'patient'   
            ])
            ->add('dateSortie',DateType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'dateSortie'   
            ])
            ->add('medecin',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'medecin'   
            ])
            ->add('hospitalisation', ChoiceType::class, [

                'choices'  => [
                 'choisir' => 'genre',
                  'Encours' => 'encours',
                  'Terminer' => 'terminer', 
                    
                    ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'hospitalisation'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HistoriqueHospitalisation::class,
        ]);
    }
}
