<?php
/**
 * Created by PhpStorm.
 * User: jad
 * Date: 8/10/16
 * Time: 5:36 PM
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\JobType;
use Symfony\Component\HttpFoundation\Request;


class JobController extends Controller
{

    /**
     * @Route("/job/new", name="job_new")
     */
    public function newJobAction(Request $request)
    {
        $repo = $this->getDoctrine()->getManager()->getRepository('AppBundle\Entity\Proposal');
        $job = new Job();
        $form = $this->createForm(JobType::class, $job, [
            'proposals' => $repo->getApprovedProposals(),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/newJob.html.twig', [
            'form' => $form->createView(), 'job' => []
        ]);

    }

}