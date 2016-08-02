<?php

namespace AppBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;


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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $progressReport;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->progressReport = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add progressReport
     *
     * @param \AppBundle\Entity\ProgressReport $progressReport
     *
     * @return User
     */
    public function addProgressReport(\AppBundle\Entity\ProgressReport $progressReport)
    {
        $this->progressReport[] = $progressReport;

        return $this;
    }

    /**
     * Remove progressReport
     *
     * @param \AppBundle\Entity\ProgressReport $progressReport
     */
    public function removeProgressReport(\AppBundle\Entity\ProgressReport $progressReport)
    {
        $this->progressReport->removeElement($progressReport);
    }

    /**
     * Get progressReport
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProgressReport()
    {
        return $this->progressReport;
    }
}
