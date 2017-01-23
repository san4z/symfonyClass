<?php

namespace AppBundle\Controller;

use AppBundle\Form\DeviceCategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
/**
     * @Route("/devices/category")
     * @Security("is_granted('ROLE_USER')")
     */
class DeviceCategoryController extends AppController {

    /**
     * @Route("/show",name="show_device_category")
     * @Template
     */
    public function indexAction() {
        $device_cetegories = $this->getDoctrine()->getRepository('AppBundle:DeviceCategory')->findAll();
        return [
            "device_cetegories" => $device_cetegories
        ];
    }

    /**
     * @Route("/add",name="add_device_category")
     * @Template
     */
    public function addAction(Request $request, $name = "guest") {
   
        $form = $this->createForm(DeviceCategoryType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            $em = $this->getEm();
            $em->persist($data);
            $em->flush();

           
                $path = "add_device_category";
      
        

            return $this->redirectToRoute($path);
        }
          $device_cetegories = $this->getDoctrine()->getRepository('AppBundle:DeviceCategory')->findAll();
        return [

            "myform" => $form->createView(),
            "device_cetegories" => $device_cetegories
        ];
        
    }

    /**
     * @Route("/edit/{id}",name="edit_device_category")
     * @ParamConverter("category", class="AppBundle:DeviceCategory")
     * @Template
     */
    public function editAction(Request $request, $category) {
        $form = $this->createForm(DeviceCategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isValid()) {
//            $data = $form->getData();
            $em = $this->getEm();

            $em->flush();
            return $this->redirectToRoute("add_device_category");
        }
        return [

            "myform" => $form->createView()
        ];
    }

}
