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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Form\ProposalType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\BinaryFileResponse;




class ProposalController extends Controller
{

    /**
     * @Route("/download/{proposal_id}", name="proposal_download")
     * @ParamConverter("proposal", class="AppBundle:Proposal", options={"id" = "proposal_id"})
     */
    public function downloadProposalsAction(Request $request, Proposal $proposal)
    {
        if (!$proposal) {
            throw $this->createNotFoundException('Unable to find Proposal entity.');
        }

        $headers = array(
            'Content-Disposition' => 'attachment; filename="'.$proposal->getProposalName().'"'
        );

        $filename = $this->getParameter('proposals_directory').'/'.$proposal->getProposalName();

        return new Response(file_get_contents($filename), 200, $headers);

    }


    /**
     * @Route("/proposal", name="proposal_list")
     */
    public function listProposalsAction()
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

            $proposal->setUpdatedAt(date_create());

            if($proposal->getProposalName()){
                $fileName = $this->get('app.proposal_uploader')->upload($proposal->getProposalName());
                $proposal->setProposalName($fileName);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($proposal);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/newProposal.html.twig', [
            'form' => $form->createView(), 'proposal' =>[]
        ]);

    }

    /**
     * @Route("/proposal/{proposal_id}", name="proposal_view")
     * @ParamConverter("proposal", class="AppBundle:Proposal", options={"id" = "proposal_id"})
     */
    public function viewProposalAction(Request $request, Proposal $proposal)
    {

        return $this->render('default/newProposal.html.twig', [
        ]);

    }



    /**
     * @Route("/proposal/edit/{proposal_id}", name="proposal_edit")
     * @ParamConverter("proposalIndividual", class="AppBundle:Proposal", options={"id" = "proposal_id"})
     */
    public function editProposalAction(Request $request, Proposal $proposalIndividual)
    {



        $form = $this->createForm(ProposalType::class, $proposalIndividual);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $proposalIndividual->setUpdatedAt(date_create());


            if($proposalIndividual->getProposalName() && $proposalIndividual->getProposalName() instanceof UploadedFile){
                $fileName = $this->get('app.proposal_uploader')->upload($proposalIndividual->getProposalName());
                $proposalIndividual->setProposalName($fileName);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($proposalIndividual);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/newProposal.html.twig', [
            'form' => $form->createView(), 'proposal' => $proposalIndividual
        ]);

    }
}