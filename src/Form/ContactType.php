<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
                    'Choisissez une option' => '',
                    'Appartement' => 'appartement',
                    'Maison' => 'maison',
                    'Autre' => 'autre',
                ],
            ])
            ->add('foyer', ChoiceType::class, [
                'label' => 'Vous êtes ',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
                'choices' => [
                    'Choisissez une option' => '',
                    'Propriétaire' => 'proprietaire',
                    'Locataire' => 'locataire',
                ],
            ])
            ->add('styles', ChoiceType::class, [
                'choices'  => [
                    'Cocooning' => 'cocooning',
                    'Pastel' => 'pastel',
                    'Chalet' => 'chalet',
                    'Marin' => 'marin',
                    'Méditerranéen' => 'mediterraneen',
                    'Bohème' => 'boheme',
                    'Jungle' => 'jungle',
                    'Végétal' => 'vegetal',
                    'Safari' => 'safari',
                    'Mexicain' => 'mexicain',
                    'Contemporain' => 'contemporain',
                    'Campagne' => 'campagne',
                    'Pop art' => 'pop_art',
                    'Kids bohème' => 'kids_boheme',
                    'Kids forêt' => 'kids_foret',
                    'Kids jungle' => 'kids_jungle',
                    'Kids savane' => 'kids_savane',
                ],
                'multiple' => true,
                'expanded' => true,
                'label_attr' => ['class' => 'checkbox-inline'],
                'choice_attr' => function($choice, $key, $value) {
                    return ['class' => 'checkbox-custom'];
                },
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
