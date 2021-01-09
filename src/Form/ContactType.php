<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    //Tout ce que l'on aura dans le formulaire
    // Regex -> ^: Start of String
    //       -> $: End of String
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $message ="";
        $builder

            ->add('nom', TextType::class, [
                'attr'=>[
                    'placeholder' => "Votre nom",
                ],
                'constraints' =>[
                    new NotBlank(),
                    new Regex(
                        array(
                            'pattern' =>'/^[a-zA-Z]+$/',
                            'message'=> "Le nom est invalide !"
                        )
                    )
                ],

            ])
            ->add('prenom',TextType::class, [
                'attr'=>[
                    'placeholder' => "Votre prenom"
                ],
                'constraints' =>[
                    new NotBlank(),
                    new Regex(
                        array(
                            'pattern' =>'/^[a-zA-Z]+$/',
                            'message' => "Le prénom est invalide !"
                        )
                    )
                ]
            ])
            ->add('entreprise',TextType::class, [
                'attr'=>[
                    'placeholder' => "Votre Entreprise (facultatif) "
                ],
                'constraints' =>[
                    new Regex(
                        array(
                            'pattern' =>'/^[a-zA-Z0-9 ]+$/',
                            'message' =>"Le nom de l'entreprise ne peut contenir des caractères spéciaux !"
                        )
                    )
                ],
                'required' => false,
            ])

            ->add('email', EmailType::class, [
                'attr'=>[
                    'placeholder' => "Votre email"
                ],
                'constraints' =>[
                    new NotBlank()
                ]
            ])
            ->add('message', TextAreaType::class, [
                'attr'=>[
                    'placeholder' => "Votre message"
                ],
                'constraints' =>[
                    new NotBlank(),
                    new Regex(
                        array(
                            'pattern' => '/^[a-zA-Z0-9\,\.\?\! ]+$/',
                            'message' =>"Le message rentré est invalide !"
                        )
                    )

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
