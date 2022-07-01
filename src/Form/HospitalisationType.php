<?php

namespace App\Form;

use App\Entity\Hospitalisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HospitalisationType extends AbstractType
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
            ->add('dateEntree',DateType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'dateEntree'   
            ])
            ->add('dateSortie',DateType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'dateSortie'   
            ])
            ->add('statut',ChoiceType::class,[
                'choices'  => [
                    '' => null,
                    'Yes' => true,
                    'No' => false,
                ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'statut'   
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hospitalisation::class,
        ]);
    }
}
