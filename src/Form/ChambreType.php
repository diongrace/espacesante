<?php

namespace App\Form;

use App\Entity\Chambre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomChambre', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'nomChambre'   
            ])
            ->add('numeroChambre', NumberType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'numeroChambre'   
            ])
            ->add('nombreLits', NumberType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'nombreLits'   
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chambre::class,
        ]);
    }
}
