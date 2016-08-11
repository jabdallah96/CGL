<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\RequestJob;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\RequestJobType;
use Symfony\Component\HttpFoundation\Request;


class RequestJobController extends Controller
{

    /**
     * @Route("/request/new", name="request_job_new")
     */
    public function newRequestJobAction(Request $request)
    {
        $requestJob = new RequestJob();
        $form = $this->createForm(RequestJobType::class, $requestJob);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($requestJob);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/newRequestJob.html.twig', [
            'form' => $form->createView(), 'request_job' => []
        ]);
    }

}