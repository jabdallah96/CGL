<?php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProposalRepository extends EntityRepository
{

    public function getPendingProposals()
    {
        return $this->createQueryBuilder('p')
            ->where('p.status = :status')
            ->setParameter('status', 0)
            ->getQuery()->execute();
    }

    public function getApprovedProposals()
    {
        return $this->createQueryBuilder('p')
            ->where('p.status = :status')
            ->setParameter('status', 1)
            ->getQuery()->execute();
    }

    public function searchProposalByTerm($term)
    {

        return $this->createQueryBuilder('p')
            ->select("p")
            ->join('p.client','c')
            ->where('c.name like :term')
            ->orWhere('c.phone like :term')
            ->orWhere('c.email like :term')
            ->orWhere('c.contactPerson like :term')
            ->orWhere('c.createdAt like :term')
            ->orWhere('p.reference like :term')
            ->orWhere('p.series like :term')
            ->orWhere('p.status like :term')
            ->orWhere('p.type like :term')
            ->orWhere('p.approvedAt like :term')
            ->setParameter('term', '%'.$term.'%')
            ->getQuery()->execute();

    }


}