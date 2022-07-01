<?php

namespace App\Form;

use App\Entity\Lits;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero', NumberType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'numero'   
            ])
            ->add('statut', ChoiceType::class, [
                'choices'  => [
                    '' => null,
                    'Yes' => true,
                    'No' => false,
                ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'statut'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lits::class,
        ]);
    }
}
