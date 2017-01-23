<?php

namespace AppBundle\Form;

use Proxies\__CG__\AppBundle\Entity\Device;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeviceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, ["label" => "نام دستگاه"])
            ->add('model',TextType::class, ["label" => "مدل"])
            ->add('price',  NumberType::class, ["label" => "قیمت"])
            ->add('stock',NumberType::class, ["label" => "موجودی"])
           ->add('deviceCategory', null, ["choice_label" => function($data){
                return $data->getName();
            }])
         
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Device::class
        ]);
    }
}
