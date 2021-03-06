<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Type\RoleChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'email'
            ])
            ->add('roles', RoleChoiceType::class, [
                'choices'  => [
                     'Administrateur' => 'ROLE_ADMIN',
                     'Utilisateur' => 'ROLE_USER',
                     'Patient' => 'ROLE_PATIENT', 
                       
                       ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'roles'
            ])
            ->add('nom',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'nom'
            ])
            ->add('prenom',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'nom'
            ])
            ->add('genre',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'genre'
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
