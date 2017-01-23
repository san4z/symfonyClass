<?php

namespace AppBundle\Controller;

use AppBundle\Form\ServiceCategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
/**
     * @Route("/services/category")
     * @Security("is_granted('ROLE_USER')")
     */
class ServiceCategoryController extends AppController {

    /**
     * @Route("/show",name="show_service_category")
     * @Template
     */
    public function indexAction() {
        $service_cetegories = $this->getDoctrine()->getRepository('AppBundle:ServiceCategory')->findAll();
        return [
            "service_cetegories" => $service_cetegories
        ];
    }

    /**
     * @Route("/add",name="add_service_category")
     * @Template
     */
    public function addAction(Request $request, $name = "guest") {
   
        $form = $this->createForm(ServiceCategoryType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            $em = $this->getEm();
            $em->persist($data);
            $em->flush();

           
                $path = "add_service_category";
      
        

            return $this->redirectToRoute($path);
        }
          $service_cetegories = $this->getDoctrine()->getRepository('AppBundle:ServiceCategory')->findAll();
        return [

            "myform" => $form->createView(),
            "service_cetegories" => $service_cetegories
        ];
        
    }

    /**
     * @Route("/edit/{id}",name="edit_service_category")
     * @ParamConverter("category", class="AppBundle:ServiceCategory")
     * @Template
     */
    public function editAction(Request $request, $category) {
        $form = $this->createForm(ServiceCategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isValid()) {
//            $data = $form->getData();
            $em = $this->getEm();

            $em->flush();
            return $this->redirectToRoute("add_service_category");
        }
        return [

            "myform" => $form->createView()
        ];
    }

}
