<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Device
 *
 * @ORM\Table(name="device")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeviceRepository")
 */
class Device {

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
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     * @Assert\NotBlank()
   
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="stock", type="string", length=255)
     */
    private $stock;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="DeviceCategory", inversedBy="devices")
     */
    private $deviceCategory;

    /**
     *
     * @ORM\OneToMany(targetEntity="ServiceList", mappedBy="device")
     */
    private $services;

    /*     * ******************************************* */
    /*     * ******************************************* */
    /*     * ******************************************* */

    /**
     * Constructor
     */
    public function __construct() {
        $this->services = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Device
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Device
     */
    public function setModel($model) {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Device
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set stock
     *
     * @param string $stock
     *
     * @return Device
     */
    public function setStock($stock) {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return string
     */
    public function getStock() {
        return $this->stock;
    }

    /**
     * Set deviceCategory
     *
     * @param \AppBundle\Entity\DeviceCategory $deviceCategory
     *
     * @return Device
     */
    public function setDeviceCategory(\AppBundle\Entity\DeviceCategory $deviceCategory = null) {
        $this->deviceCategory = $deviceCategory;

        return $this;
    }

    /**
     * Get deviceCategory
     *
     * @return \AppBundle\Entity\DeviceCategory
     */
    public function getDeviceCategory() {
        return $this->deviceCategory;
    }

    /**
     * Add service
     *
     * @param \AppBundle\Entity\ServiceList $service
     *
     * @return Device
     */
    public function addService(\AppBundle\Entity\ServiceList $service) {
        $this->services[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \AppBundle\Entity\ServiceList $service
     */
    public function removeService(\AppBundle\Entity\ServiceList $service) {
        $this->services->removeElement($service);
    }

    /**
     * Get services
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServices() {
        return $this->services;
    }

}
