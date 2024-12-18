<?php

namespace App\Form;

use App\Entity\Realisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RealisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', \Doctrine\DBAL\Types\TextType::class, [
                'label' => 'Titre',
                'attr' => ['placeholder' => 'Titre', 'form-control'],
                'label_attr' => ['class' => 'sr-only'],
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
                'label_attr' => ['class' => 'sr-only'],
                'attr' => ['accept' => 'image/*', 'class' => 'form-control','placeholder' => 'Image'],
            ])
            ->add('formule_id')
            ->add('createdAt', null, [
                'widget' => 'single_text',
                'attr' => ['placeholder' => 'Date', 'readonly' => true, 'form-control'],
                'label_attr' => ['class' => 'sr-only'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Realisation::class,
        ]);
    }
}
