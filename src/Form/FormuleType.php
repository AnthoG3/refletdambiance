<?php

namespace App\Form;

use App\Entity\Formule;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['placeholder' => 'Titre','class' => 'form-control'],
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('texte', TextType::class, [
                'label' => 'Texte',
                'attr' => ['placeholder' => 'Texte','class' => 'form-control'],
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'attr' => ['placeholder' => 'Image','class' => 'form-control'],
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('price', TextType::class, [
                'label' => 'Prix',
                'attr' => ['placeholder' => 'Prix','class' => 'form-control'],
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
                'label' => 'Date',
                'attr' => ['placeholder' => 'Date','class' => 'form-control'],
                'label_attr' => ['class' => 'control-label'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formule::class,
        ]);
    }
}
