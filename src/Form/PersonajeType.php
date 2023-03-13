<?php

namespace App\Form;

use App\Entity\Personaje;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonajeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('status')
            ->add('species')
            ->add('gender')
            ->add('image')
            ->add('name')
           // ->add('episodio')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personaje::class,
        ]);
    }
}
