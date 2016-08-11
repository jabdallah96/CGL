<?php

namespace AppBundle\Entity;

/**
 * Job
 */
class Job
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $number;

    /**
     * @var \DateTime
     */
    private $delivery;

    /**
     * @var string
     */
    private $billOfQuantities;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    private $proposal;

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
     * Set number
     *
     * @param integer $number
     *
     * @return Job
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set delivery
     *
     * @param \DateTime $delivery
     *
     * @return Job
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return \DateTime
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set billOfQuantities
     *
     * @param string $billOfQuantities
     *
     * @return Job
     */
    public function setBillOfQuantities($billOfQuantities)
    {
        $this->billOfQuantities = $billOfQuantities;

        return $this;
    }

    /**
     * Get billOfQuantities
     *
     * @return string
     */
    public function getBillOfQuantities()
    {
        return $this->billOfQuantities;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Job
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Job
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * @var \AppBundle\Entity\Vehicle
     */
    private $vehicle;

    /**
     * @var \AppBundle\Entity\JobOpeningRequest
     */
    private $jor;


    /**
     * Set vehicle
     *
     * @param \AppBundle\Entity\Vehicle $vehicle
     *
     * @return Job
     */
    public function setVehicle(\AppBundle\Entity\Vehicle $vehicle = null)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Get vehicle
     *
     * @return \AppBundle\Entity\Vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Set jor
     *
     * @param \AppBundle\Entity\JobOpeningRequest $jor
     *
     * @return Job
     */
    public function setJor(\AppBundle\Entity\JobOpeningRequest $jor = null)
    {
        $this->jor = $jor;

        return $this;
    }

    /**
     * Get jor
     *
     * @return \AppBundle\Entity\JobOpeningRequest
     */
    public function getJor()
    {
        return $this->jor;
    }

    /**
     * @return mixed
     */
    public function getProposal()
    {
        return $this->proposal;
    }

    /**
     * @param mixed $proposal
     */
    public function setProposal($proposal)
    {
        $this->proposal = $proposal;
    }
}
