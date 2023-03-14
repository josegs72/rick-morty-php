<?php

namespace App\Form;

use App\Entity\Episodios;
use App\Entity\Personaje;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\UX\Dropzone\Form\DropzoneType;

class PersonajeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class,[
                'label' => 'Nombre del personaje',
                'attr' => ['placeholder' => 'Escribe nombre del personaje'],

            ])
            ->add('status')
            ->add('species')
            ->add('gender')
            ->add('imagenPersonaje' , FileType::class, ['mapped' => false])
            ->add('episodio' , EntityType::class, [
                // looks for choices from this entity
                'class' => Episodios::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'episodio',
            
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
            
            ->add('enviar',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personaje::class,
        ]);
    }
}
