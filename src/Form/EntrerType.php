<?php

namespace App\Form;

use App\Entity\Stock;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
             ->add('NomProduit',TextType::class,[
                 'label'=>"Nom de produit :",
                 'attr'=>['placeholder' => 'Ex: Tableau']
             ] )

            ->add('idProduct',NumberType::class,[
                'label'=>"Numero de produit :",
                'attr'=>['placeholder' => 'Ex: 51']
            ] )

            ->add('idStock',NumberType::class,[
                'label'=>"Numero de stock :",
                'mapped'=>false
            ])

            ->add('quantite',NumberType::class,[
                'label'=>"Quantité de produit :"
            ])

            ->add('Type',TextType::class,[
                'label'=>"type de catégories :",
                'mapped'=>false,
                'attr'=>['placeholder' => 'Ex: Entré (ou Sortie) ']
            ] )

            ->add('references',TextType::class,[
                'label'=>"References :",
                'mapped'=>false,
                'attr'=>['placeholder' => 'Ex: ']
            ] )

            ->add('dateEntre',DateType::class,[
                'label'=>"Date de début : "
            ])
            ->add('arreter',DateType::class,[
                'label'=>"Date de Fin :"
            ])
            
            ->add('Submit',SubmitType::class,[
                'label'=>"valider"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stock::class,
        ]);
    }
}
