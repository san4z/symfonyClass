<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ServiceList
 *
 * @ORM\Table(name="service_list")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceListRepository")
 */
class ServiceList {

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
     * @ORM\Column(name="service_no", type="string", length=255)
     */
    private $serviceNo;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="time", type="string", length=255)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text" , nullable=true)
     */
    private $description;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Hospital", inversedBy="services")
     */
    private $hospital;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Device", inversedBy="services")
     */
    private $device;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="ServiceCategory", inversedBy="services")
     */
    private $serviceCategory;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="services")
     */
    private $user;

    /*     * ******************************** */
    /*     * ******************************** */
    /*     * ******************************** */

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set serviceNo
     *
     * @param string $serviceNo
     *
     * @return ServiceList
     */
    public function setServiceNo($serviceNo) {
        $this->serviceNo = $serviceNo;

        return $this;
    }

    /**
     * Get serviceNo
     *
     * @return string
     */
    public function getServiceNo() {
        return $this->serviceNo;
    }

    /**
     * Set time
     *
     * @param string $time
     *
     * @return ServiceList
     */
    public function setTime($time) {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime() {
        return $this->time;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ServiceList
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set hospital
     *
     * @param \AppBundle\Entity\Hospital $hospital
     *
     * @return ServiceList
     */
    public function setHospital(\AppBundle\Entity\Hospital $hospital = null) {
        $this->hospital = $hospital;

        return $this;
    }

    /**
     * Get hospital
     *
     * @return \AppBundle\Entity\Hospital
     */
    public function getHospital() {
        return $this->hospital;
    }

    /**
     * Set device
     *
     * @param \AppBundle\Entity\Device $device
     *
     * @return ServiceList
     */
    public function setDevice(\AppBundle\Entity\Device $device = null) {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device
     *
     * @return \AppBundle\Entity\Device
     */
    public function getDevice() {
        return $this->device;
    }

    /**
     * Set serviceCategory
     *
     * @param \AppBundle\Entity\ServiceCategory $serviceCategory
     *
     * @return ServiceList
     */
    public function setServiceCategory(\AppBundle\Entity\ServiceCategory $serviceCategory = null) {
        $this->serviceCategory = $serviceCategory;

        return $this;
    }

    /**
     * Get serviceCategory
     *
     * @return \AppBundle\Entity\ServiceCategory
     */
    public function getServiceCategory() {
        return $this->serviceCategory;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return ServiceList
     */
    public function setUser(\AppBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

}
