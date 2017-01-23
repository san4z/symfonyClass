<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HospitalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, ["label" => "نام مرکز"])
            ->add('state',TextType::class, ["label" => "استان مرکز"])
            ->add('city',TextType::class, ["label" => "شهر مرکز"])
            ->add('phone',TextType::class, ["label" => "تلفن"])
            ->add('fax',TextType::class, ["label" => "فکس"])
            ->add('address',  TextareaType::class, ["label" => "آدرس مرکز"])
           
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => \AppBundle\Entity\Hospital::class
        ]);
    }
}
