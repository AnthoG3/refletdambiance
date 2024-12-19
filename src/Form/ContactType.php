<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom et prénom',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
            ])
            ->add('pieces', ChoiceType::class, [
                'label' => 'Nb de pièces',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
                'choices' => [
                    'Choisissez une option' => '',
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5 et +' => 5,
                ],
            ])
            ->add('m2', IntegerType::class, [
                'label' => 'Nombre de m²',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
                ])
            ->add('habitation', ChoiceType::class, [
                'label' => 'Type d\'habitation',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
                'choices' => [
                    'Appartement' => 'appartement',
                    'Maison' => 'maison',
                    'Autre' => 'autre',
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Description du projet',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
