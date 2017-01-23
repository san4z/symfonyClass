<?php

namespace AppBundle\Controller;

use AppBundle\Form\HospitalType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
/**
     * @Route("/hospitals")
     * 
     */
class HospitalController extends AppController {

    /**
     * @Route("/show",name="show_hospitals")
     * @Template
     */
    public function indexAction() {
        $hospitals = $this->getDoctrine()->getRepository('AppBundle:Hospital')->findAll();
        return [
            "hospitals" => $hospitals
        ];
    }

    /**
     * @Route("/add",name="add_hospital")
     * @Template
     */
    public function addAction(Request $request, $name = "guest") {
   
        $form = $this->createForm(HospitalType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();

           
                $path = "add_hospital";
      
        

            return $this->redirectToRoute($path);
        }
          $hospitals = $this->getDoctrine()->getRepository('AppBundle:Hospital')->findAll();
        return [

            "myform" => $form->createView(),
            "hospitals" => $hospitals
        ];
        
    }

    /**
     * @Route("/edit/{id}",name="edit_hospital")
     * @ParamConverter("hospital", class="AppBundle:Hospital")
     * @Template
     */
    public function editAction(Request $request, $hospital) {
        $form = $this->createForm(HospitalType::class, $hospital);
        $form->handleRequest($request);
        if ($form->isValid()) {
//            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $em->flush();
            return $this->redirectToRoute("hospitals");
        }
        return [

            "myform" => $form->createView()
        ];
    }

}
