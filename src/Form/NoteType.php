<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Note;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note',NumberType::class,[
                'attr'=> [
                    'min'=> 0,
                    'max'=> 20,
                    'step'=>0.25
                ]
            ])
            ->add('coefficient',IntegerType::class,[
                'attr'=> [
                    'min'=> 1
                ]
            ])

            ->add('date', DateType::class,[
                'widget'=> 'single_text',
                'format'=>'dd/MM/yyyy'
            ])

            ->add('matiere', EntityType::class,[
                'class'=> Matiere::class,
                'choice_label'=> function($eleve){
                    return $eleve->getPrenom(). ' ' . strtoupper($eleve->getNom());
                }
            ])
            ->add('eleve',EntityType::class,[
                'class'=> Eleve::class,
                'choice-label'=> 'nom'
            ])

            ->add('submit',SubmitType::class,[
                'label'=>'Envoyer'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
