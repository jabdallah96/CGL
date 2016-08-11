<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use AppBundle\Entity\Job;

class Proposal
{
    const PENDING = 'Pending';
    const APPROVED = 'Approved';
    const CANCELLED = 'Cancelled by CGL';
    const DROPPED = 'Dropped by Client';
    const LOST = 'Lost to Competitor';

    const REPAIR = 'Repair';
    const TRADE = 'Trade';
    const NONINSULATED = 'Non-Insulated';
    const INSULATED = 'Insulated';
    const COLDROOMS = 'Coldrooms';

    const SAMER = 'Samer Bou Ali';
    const OTHER = 'Other';

    private $proposalName;
    private $id;
    private $status;
    private $number;
    private $createdAt;
    private $client;
    private $job;
    private $approvedAt = null;
    private $updatedAt;
    private $series;
    private $type;
    private $proposalFile;
    private $reference;
    private $delContact;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setClient(\AppBundle\Entity\Client $client)
    {
        $this->client = $client;
        $this->setReference( (($this->series*10000)+$this->id).$this->delContact."_".$this->createdAt->format('mY')."_".$client->getName() );
        return $this;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setJob(Job $job = null)
    {
        $this->job = $job;

        return $this;
    }

    public function getJob()
    {
        return $this->job;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->updateApproval($status);

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function setApprovedAt($approvedAt)
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    public function getApprovedAt()
    {
        return $this->approvedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setSeries($series)
    {
        $this->series = $series;
        $this->setReference( (($series*10000)+$this->id).$this->delContact."_".$this->createdAt->format('mY')."_".$this->client->getName() );
        return $this;
    }

    public function getSeries()
    {
        return $this->series;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    static function getStatuses()
    {
        return [
            self::PENDING => 0,
            self::APPROVED => 1,
            self::CANCELLED => 2,
            self::DROPPED => 3,
            self::LOST => 4,
        ];
    }

    static function getStatusesReverse()
    {
        return array_flip(self::getStatuses());
    }
    static function getSeriesChoices()
    {
        return [
            self::REPAIR => 5,
            self::TRADE => 6,
            self::NONINSULATED => 7,
            self::INSULATED => 8,
            self::COLDROOMS => 9,
        ];
    }

    static function getAllContacts()
    {
        return [
            self::SAMER => 'SB',
            self::OTHER => 'OT',
        ];
    }
    static function getAllContactNames()
    {
        return array_flip(self::getAllContacts());
    }

    public function setProposalName($proposalName)
    {
        $this->proposalName = $proposalName;

        return $this;
    }


    public function getProposalName()
    {
        return $this->proposalName;
    }

    public function setProposalFile(File $proposal = null)
    {
        $this->proposalFile = $proposal;

        return $this;
    }

    public function getProposalFile()
    {
        return $this->proposalFile;
    }

    public function updateApproval($status)
    {
        if ($status === $this->getStatuses()[self::APPROVED] ) {
            $this->approvedAt = new \DateTimeImmutable();
        }
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setDelContact($delContact)
    {
        $this->delContact = $delContact;
        $this->setReference( (($this->series*10000)+$this->id).$delContact."_".$this->createdAt->format('mY')."_".$this->client->getName() );
        return $this;
    }


    public function getDelContact()
    {
        return $this->delContact;
    }


}
