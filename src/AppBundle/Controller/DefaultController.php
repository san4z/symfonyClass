<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Device;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AppController
{
    
    
    
     /**
     * @Route("/", name="homepage")
     * @Template
     */
    public function indexAction(Request $request) {

        return [];
    }
    
    
    /**
     * @Route("/add", name="deviceadd")
     * @Template
     */
    public function index2Action(Request $request)
    {
        
//        $device = new Device();
//        $device
//                ->setName("microvent")
//                ->setModel("modelno1")
//                ->setPrice("12000")
//                ->setStock("5")
//                ;
//        $em=$this->getDoctrine()->getManager();
//        $em->persist($device);
//        $em->flush();

        // replace this example code with whatever you need
//        return  [
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
//        ];
    }
    /**
     * @Route("/addhospital/{id}", name="hospitaladd")
     * @ParamConverter("id",class="AppBundle:Hospital")
     * @Template
     */
    public function index3Action(Request $request,  \AppBundle\Entity\Hospital $hospitalId)
    {
        
        $hospital = new \AppBundle\Entity\Hospital();
        $hospital
                ->setName("namazi")
                ->setCity("shz")
                ->setState("fars")
                ->setField("amuzeshi darmani")
                ->setPhone("546841")
                ->setAddress("falake namazi")
                ->setExpertise("general")
                ->setFax("877984")
                ->setSubordinate("university")
                ;
                
              
        $em=$this->getDoctrine()->getManager();
        $em->persist($hospital);
        $em->flush();
        $hospital=$em->getRepository('AppBundle:Hospital')->find($hospitalId);
        return array("hospital"=>$hospital);
    }
}
