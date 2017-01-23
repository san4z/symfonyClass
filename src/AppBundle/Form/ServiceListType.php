<?php

namespace AppBundle\Form;

use AppBundle\Entity\ServiceList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceListType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('serviceN', TextType::class, ["label" => "شماره سرویس"])
                ->add('time', TextType::class, ["label" => "تاریخ ورود"])
                ->add('serviceCategory', null, ["choice_label" => function($data) {
                        return $data->getName();
                    }])
                ->add('hospital', null, ["choice_label" => function($data) {
                        return $data->getName()."-".$data->getState()."-".$data->getCity();
                    }])
                ->add('device', null, ["choice_label" => function($data) {
                        return $data->getName()."-".$data->getModel();
                    }])
                ->add('description', TextareaType::class, ["label" => "توضیحات"])
       
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => ServiceList::class
        ]);
    }

}
