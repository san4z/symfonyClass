<?php

namespace AppBundle\Controller;

use AppBundle\Form\DeviceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
/**
     * @Route("/devices")
     * @Security("is_granted('ROLE_USER')")
     */
class DeviceController extends AppController {

    /**
     * @Route("/show",name="show_devices")
     * @Template
     */
    public function indexAction() {
        $hospitals = $this->getDoctrine()->getRepository('AppBundle:Device')->findAll();
        return [
            "devices" => $hospitals
        ];
    }

    /**
     * @Route("/add",name="add_device")
     * @Template
     */
    public function addAction(Request $request, $name = "guest") {
   
        $form = $this->createForm(DeviceType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            $em = $this->getEm();
            $em->persist($data);
            $em->flush();

           
                $path = "add_device";
      
        

            return $this->redirectToRoute($path);
        }
          $hospitals = $this->getDoctrine()->getRepository('AppBundle:Device')->findAll();
        return [

            "myform" => $form->createView(),
            "devices" => $hospitals
        ];
        
    }

    /**
     * @Route("/edit/{id}",name="edit_device")
     * @ParamConverter("device", class="AppBundle:Device")
     * @Template
     */
    public function editAction(Request $request, $device) {
        $form = $this->createForm(DeviceType::class, $device);
        $form->handleRequest($request);
        if ($form->isValid()) {
//            $data = $form->getData();
            $em = $this->getEm();

            $em->flush();
            return $this->redirectToRoute("add_device");
        }
        return [

            "myform" => $form->createView()
        ];
    }

}
