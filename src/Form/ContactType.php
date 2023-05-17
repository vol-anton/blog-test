<?php

namespace App\Form;

use App\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
        public function buildForm(FormBuilderInterface $builder, array $options): void {

            $builder
                ->add('firstName', TextType::class, [
                    'label' => 'Prénom',
                    'attr' => array(
                        'placeholder' => 'Entrer votre prénom'
                    )
                ])

                ->add('lastName', TextType::class, [
                    'label' => 'Nom',
                    'attr' => array(
                        'placeholder' => 'Entrer votre nom'
                    )
                ])

                ->add('email', EmailType::class, [
                    'label' => 'Email',
                    'attr' => array(
                        'placeholder' => 'Entrer votre email'
                    )
                ])

                ->add('phone', TextType::class, [
                    'label' => 'Votre numéro de téléphone',
                    'attr' => array (
                        'placeholder' => 'Entrer votre numéro de téléphone'
                    )
                ])

                ->add('object', ChoiceType::class, [
                    'label' => 'Choisissez un motif',
                    'choices' => [
                        'Je suis un professionnel de formation' => 'Choix 1',
                        'Je suis à la recherche d\'un poste en entreprise' => 'Choix 2',
                        'Je veux devenir formateur/formatrice' => 'Choix 3',
                        'Je veux devenir partenaire commercial' => 'Choix 4',
                        'Autres' => 'Choix 5'
                    ]
                ])

                ->add('message', TextareaType::class, [
                    'label' => 'Votre message',
                    'attr' => array(
                        'placeholder' => 'Ecrivez votre message ici'
                    )
                ])

                ->add('envoyer', SubmitType::class, [
                    'attr' => ['class' => 'save btn-primary'],
                ]);
            ;
        }

        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => Contacts::class,
            ]);
        }
}

?>