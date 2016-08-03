<?php
/**
 * Created by PhpStorm.
 * User: jad
 * Date: 8/3/16
 * Time: 10:04 AM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Proposal;
use AppBundle\Form\ProposalType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class ProposalController extends Controller
{
    /**
     * @Route("/proposal", name="proposal_list")
     */
    public function listProposalsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $proposalsPending = $em->getRepository('AppBundle\Entity\Proposal')->displayProposalByStatus(0);
        $proposalsApproved = $em->getRepository('AppBundle\Entity\Proposal')->displayProposalByStatus(1);

        return $this->render('default/listProposals.html.twig',
            ['pending' => $proposalsPending , 'approved' => $proposalsApproved]);
    }

    /**
     * @Route("/proposal/new", name="proposal_new")
     */
    public function newProposalsAction(Request $request)
    {
        $proposal = new Proposal();
        $form = $this->createForm(ProposalType::class, $proposal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $proposal->setCreatedAt(date_create());
            $em = $this->getDoctrine()->getManager();
            $em->persist($proposal);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/newProposal.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}