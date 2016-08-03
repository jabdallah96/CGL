<?php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProposalRepository extends EntityRepository
{
    public function displayProposalByStatus($status)
    {
        $qb = $this->createQueryBuilder('p')
            ->select("p")
            ->where('p.status = :status')
            ->setParameter('status', $status);
        return $qb->getQuery()->execute();
    }

}