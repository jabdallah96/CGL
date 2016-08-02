<?php

namespace AppBundle\Entity;

/**
 * ProgressReport
 */
class ProgressReport
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $comments;

    /**
     * @var \DateTime
     */
    private $date;


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
     * Set comments
     *
     * @param string $comments
     *
     * @return ProgressReport
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ProgressReport
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @var \AppBundle\Entity\User
     */
    private $artist;


    /**
     * Set artist
     *
     * @param \AppBundle\Entity\User $artist
     *
     * @return ProgressReport
     */
    public function setArtist(\AppBundle\Entity\User $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return \AppBundle\Entity\User
     */
    public function getArtist()
    {
        return $this->artist;
    }
}
