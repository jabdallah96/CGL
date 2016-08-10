<?php

namespace AppBundle\Controller;

use AppBundle\Form\SearchProposalType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MainController extends Controller
{
    /**
     * @Route("/index", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $repo = $this->getDoctrine()->getManager()->getRepository('AppBundle\Entity\Proposal');
        $proposalsPending = $repo->getPendingProposals();
        $proposalsApproved = $repo->getApprovedProposals();

        return $this->render('default/index.html.twig', [
                'pending' => $proposalsPending,
                'approved' => $proposalsApproved,
            ]
        );

    }
}