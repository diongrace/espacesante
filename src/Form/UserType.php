<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Type\RoleChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'email'
            ])
            ->add('roles', RoleChoiceType::class, [
                'choices'  => [
                     'ROLE_ADMIN' => 'administrateur',
                     'ROLE_USER' => 'utilisateur', 
                     'ROLE_PATIENT' => 'patient', 
                       ],
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'roles'
            ])
            // ->add('password')
            // ->add('nom')
            // ->add('prenom')
            // ->add('genre')
            // ->add('dateNaissance')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
