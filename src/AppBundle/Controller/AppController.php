<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller {

    /**
     * 
     * @return \AppBundle\Entity\User
     */
    protected function getUser() {
        return parent::getUser();
    }

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm() {
        return $this->getDoctrine()->getManager();
    }

    protected function trans($string) {
        return $this->get('translator')->trans($string);
    }

}
