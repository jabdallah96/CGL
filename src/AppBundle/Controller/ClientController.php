<?php
/**
 * Created by PhpStorm.
 * User: jad
 * Date: 8/3/16
 * Time: 10:04 AM
 */

namespace AppBundle\Controller;

use AppBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Client;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class ClientController extends Controller
{
    /**
     * @Route("/client/new", name="client_new")
     */
    public function newClientAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client->setCreatedAt(date_create());
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute('proposal_new');
        }

        return $this->render('default/newClient.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}