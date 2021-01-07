<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ContactType extends AbstractType
{
    //Tout ce que l'on aura dans le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'attr'=>[
                    'placeholder' => " Votre nom"
                ]
            ])
            ->add('prenom',TextType::class, [
                'attr'=>[
                    'placeholder' => " Votre prenom"
                ]
            ])
            ->add('entreprise',TextType::class, [
                'required' => false,
            ])

            ->add('email', EmailType::class, [
                'attr'=>[
                    'placeholder' => " Votre email"
                ]
            ])
            ->add('message', TextAreaType::class, [
                'attr'=>[
                    'placeholder' => " Votre message"
                ]
            ])
            ->add('envoyer', SubmitType::class)

        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
