<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Proposal;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Form\ProposalType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;


class ProposalController extends Controller
{

    /**
     * @Route("/download/{proposal_id}", name="proposal_download")
     * @ParamConverter("proposal", class="AppBundle:Proposal", options={"id" = "proposal_id"})
     */
    public function downloadProposalsAction(Proposal $proposal)
    {
        if (!$proposal) {
            throw $this->createNotFoundException('Unable to find Proposal entity.');
        }

        $headers = array(
            'Content-Disposition' => 'attachment; filename="' . $proposal->getProposalName() . '"'
        );

        $filename = $this->getParameter('proposals_directory') . '/' . $proposal->getProposalName();

        return new Response(file_get_contents($filename), 200, $headers);

    }

    /**
     * @Route("/document/{proposal_id}", name="proposal_document")
     * @ParamConverter("proposal", class="AppBundle:Proposal", options={"id" = "proposal_id"})
     */
    public function openProposalDocumentAction(Proposal $proposal)
    {
        if (!$proposal) {
            throw $this->createNotFoundException('Unable to find Proposal entity.');
        }

        $filename = $this->getParameter('proposals_directory') . '/' . $proposal->getProposalName();
        return new BinaryFileResponse($filename);
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

            if ($proposal->getProposalName()) {
                $fileName = $this->get('app.proposal_uploader')->upload($proposal->getProposalName());
                $proposal->setProposalName($fileName);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($proposal);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/newProposal.html.twig', [
            'form' => $form->createView(), 'proposal' => []
        ]);

    }

    /**
     * @Route("/proposal/{proposal_id}", name="proposal_view")
     * @ParamConverter("proposal", class="AppBundle:Proposal", options={"id" = "proposal_id"})
     */
    public function viewProposalAction(Request $request, Proposal $proposal)
    {
        return $this->render('default/viewProposal.html.twig', [
            'proposal' => $proposal
        ]);

    }

    /**
     * @Route("/proposal/{proposal_id}/update", name="proposal_status")
     * @ParamConverter("proposal", class="AppBundle:Proposal", options={"id" = "proposal_id"})
     */
    public function updateProposalStatusAction(Request $request, Proposal $proposal)
    {
        $status = $request->query->get('status');
        $em = $this->getDoctrine()->getManager();
        $proposal->setStatus($status);
        $em->flush();
        $response = new JsonResponse([
            'status' => 1,
            'newStatus' => $status,
        ]);
        return $response;
    }


    /**
     * @Route("/proposal/edit/{proposal_id}", name="proposal_edit")
     * @ParamConverter("proposalIndividual", class="AppBundle:Proposal", options={"id" = "proposal_id"})
     */
    public function editProposalAction(Request $request, Proposal $proposalIndividual)
    {

        if ($proposalIndividual->getProposalName()) {
            $proposalIndividual->setProposalName(
                new File($this->getParameter('proposals_directory') . '/' . $proposalIndividual->getProposalName())
            );
        }

        $form = $this->createForm(ProposalType::class, $proposalIndividual);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $proposalIndividual->setUpdatedAt(date_create());

            if ($proposalIndividual->getProposalName()) {
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

    /**
     * @Route("search/{term}", name="proposal_search")
     */
    public function searchAction($term)
    {
        $em = $this->getDoctrine()->getManager();
        $proposals = $em->getRepository('AppBundle\Entity\Proposal')->searchProposalByTerm($term);
        $error ='';
        dump($proposals);

        if(!$proposals){
            $error = 'Sorry, no proposal was found with these terms';
        }

        return $this->render('default/searchResult.html.twig', [
            'proposals' => $proposals, 'error' => $error,
        ]);
    }
}