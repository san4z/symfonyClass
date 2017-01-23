<?php

namespace AppBundle\Controller;

use AppBundle\Form\ServiceListType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/services")
 * @Security("is_granted('ROLE_USER')")
 */
class ServiceListController extends AppController {

    /**
     * @Route("/show",name="show_services")
     * @Template
     */
    public function indexAction() {
        $services = $this->getDoctrine()->getRepository('AppBundle:ServiceList')->findAll();
        return [
            "services" => $services
        ];
    }

    /**
     * @Route("/add",name="add_service")
     * @Template
     */
    public function addAction(Request $request, $name = "guest") {

        $form = $this->createForm(ServiceListType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();

            $user = $this->getUser(); // get the current user
            $data->setUser($user);

            $em = $this->getEm();
            $em->persist($data);
            $em->flush();


            $path = "add_service";



            return $this->redirectToRoute($path);
        }
        $services = $this->getDoctrine()->getRepository('AppBundle:ServiceList')->findAll();
        return [

            "myform" => $form->createView(),
            "services" => $services
        ];
    }

    /**
     * @Route("/edit/{id}",name="edit_service")
     * @ParamConverter("service", class="AppBundle:ServiceList")
     * @Template
     */
    public function editAction(Request $request, $service) {
        $form = $this->createForm(ServiceListType::class, $service);
        $form->handleRequest($request);
        if ($form->isValid()) {
//            $data = $form->getData();
            $em = $this->getEm();

            $em->flush();
            return $this->redirectToRoute("add_service");
        }
        return [

            "myform" => $form->createView()
        ];
    }

    /**
     * @Route("/delete/{id}", name="delete_service")
     * @ParamConverter("service", class="AppBundle:ServiceList")
     */
    //@Security("is_granted('ROLE_SUPER_ADMIN') or is_granted('delete', product)")
    public function deleteAction( $service) {
        $this->getEm()->remove($service);
        $this->getEm()->flush();
        //$this->addFlash("info", $this->trans("product.delete.succesful"));

        return $this->redirectToRoute("add_service");
    }

}
