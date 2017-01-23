<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * ServiceCategory
 *
 * @ORM\Table(name="service_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceCategoryRepository")
 */
class ServiceCategory {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *@Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="ServiceList", mappedBy="serviceCategory")
     */
    private $services;

    /*     * ********************************************** */
    /*     * ********************************************** */
    /*     * ********************************************** */

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->services = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ServiceCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add service
     *
     * @param \AppBundle\Entity\ServiceList $service
     *
     * @return ServiceCategory
     */
    public function addService(\AppBundle\Entity\ServiceList $service)
    {
        $this->services[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \AppBundle\Entity\ServiceList $service
     */
    public function removeService(\AppBundle\Entity\ServiceList $service)
    {
        $this->services->removeElement($service);
    }

    /**
     * Get services
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServices()
    {
        return $this->services;
    }
}
