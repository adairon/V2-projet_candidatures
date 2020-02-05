<?php

namespace App\Form;

use App\Entity\Candidature;
use App\Entity\Etape;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Condition avant le builder : 
        //en mode création (pas d'Id): on a une date de création, 
        //en mode édition (on a un Id), une date de mise à jour :
        if($options['data']->getId()==null) {
            $builder->add('Date_envoi',DateType::class,[
                'years' => ['2020','2021'],
                'format' => 'dd MM yyyy',
                'data' => new \DateTime('now', new \DateTimeZone('Europe/Paris'))
                ]);
        } else {
            $builder->add('Mise_a_jour',DateType::class,[
                'years' => ['2020','2021'],
                'format' => 'dd MM yyyy',
                'data' => new \DateTime('now', new \DateTimeZone('Europe/Paris'))
            ]);
        }

        $builder

            ->add('Poste', TextType::class,[
                'attr' => [
                    'placeholder' => 'Candidature pour quel poste ?'
                ]
            ])
            ->add('Entreprise', TextType::class,[
                'attr' => [
                    'placeholder' => 'Dans quelle entreprise ?'
                ]
            ])
            ->add('Contrat', TextType::class,[
                'attr' => [
                    'placeholder' => 'Type de contrat ?'
                ]
            ])
            ->add('Localisation', TextType::class,[
                'attr' => [
                    'placeholder' => 'Dans quelle ville ?'
                ]
            ])

            ->add('Lien', TextType::class,[
                'attr' => [
                    'required' => false,
                    'placeholder' => "Lien vers l'annonce"
                ]
            ])
            ->add('Plateforme', TextType::class,[
                'attr' => [
                    'placeholder' => 'candidature via quelle plateforme ?'
                ]
            ])

            ->add('etape', EntityType::class,[
                'class' => Etape::class,
                'choice_label' => 'etape',
                'label' => 'Etape de la candidature'
            ])
            

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidature::class,
        ]);
    }
}
