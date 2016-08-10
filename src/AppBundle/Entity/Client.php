<?php

namespace AppBundle\Entity;

/**
 * Client
 */
class Client
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var integer
     */
    private $financeNumber;

    /**
     * @var string
     */
    private $contactPerson;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $accContact;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;


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
     * Set phone
     *
     * @param string $phone
     *
     * @return Client
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Client
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set financeNumber
     *
     * @param integer $financeNumber
     *
     * @return Client
     */
    public function setFinanceNumber($financeNumber)
    {
        $this->financeNumber = $financeNumber;

        return $this;
    }

    /**
     * Get financeNumber
     *
     * @return integer
     */
    public function getFinanceNumber()
    {
        return $this->financeNumber;
    }

    /**
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return Client
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    /**
     * Get contactPerson
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Client
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set accContact
     *
     * @param string $accContact
     *
     * @return Client
     */
    public function setAccContact($accContact)
    {
        $this->accContact = $accContact;

        return $this;
    }

    /**
     * Get accContact
     *
     * @return string
     */
    public function getAccContact()
    {
        return $this->accContact;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Client
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
     * @return Client
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
     * @var string
     */
    private $name;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Client
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
     * @var \AppBundle\Entity\Proposal
     */
    private $proposal;


    /**
     * Set proposal
     *
     * @param \AppBundle\Entity\Proposal $proposal
     *
     * @return Client
     */
    public function setProposal(\AppBundle\Entity\Proposal $proposal = null)
    {
        $this->proposal = $proposal;

        return $this;
    }

    /**
     * Get proposal
     *
     * @return \AppBundle\Entity\Proposal
     */
    public function getProposal()
    {
        return $this->proposal;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proposal = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add proposal
     *
     * @param \AppBundle\Entity\Proposal $proposal
     *
     * @return Client
     */
    public function addProposal(\AppBundle\Entity\Proposal $proposal)
    {
        $this->proposal[] = $proposal;

        return $this;
    }

    /**
     * Remove proposal
     *
     * @param \AppBundle\Entity\Proposal $proposal
     */
    public function removeProposal(\AppBundle\Entity\Proposal $proposal)
    {
        $this->proposal->removeElement($proposal);
    }
    /**
     * @var integer
     */
    private $ext;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */


    /**
     * Set ext
     *
     * @param integer $ext
     *
     * @return Client
     */
    public function setExt($ext)
    {
        $this->ext = $ext;

        return $this;
    }

    /**
     * Get ext
     *
     * @return integer
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set delContact
     *
     * @param string $delContact
     *
     * @return Client
     */

}
