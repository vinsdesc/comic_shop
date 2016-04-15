<?php

namespace Vins\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vins\UserBundle\Entity\User;
use Vins\UserBundle\Form\ClientEditType;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

//pblm de redirection dans l'edit
class UserController extends BaseController
{
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
	    $clients = $em->getRepository('VinsUserBundle:Client')->findAll();
	    return $this->render('VinsUserBundle:Client:index.html.twig',	array(
	    		'clients' => $clients,
	    	));
	}


	public function showAction($id)
	{
	    $em = $this->getDoctrine()->getManager();
	    $client = $em->getRepository('VinsUserBundle:Client')->getOneClientWithAddresses($id);
	    
	    if(!$client)
	    {
	    	throw $this->createNotFoundException('Unable to find client entity');
	    }
	    return $this->render('VinsUserBundle:Client:show.html.twig',array('client' => $client)
	    );
	}

	public function editAction($id, Request $request)
    {
		$em = $this->getDoctrine()->getManager();
		$client = $em->getRepository('VinsUserBundle:Client')->find($id);

		if (!$client) {
			throw $this->createNotFoundException('Unable to find the client entity '.$id);
		}

		//forumlaire d'édition
		$editForm = $this->createForm(new ClientEditType(), $client);
		$editForm->add('submit', 'submit', array('label' => 'Update'));

		

		$editForm->handleRequest($request);
		if($editForm->isValid())
		{
			$em->flush();
			/*return $this->redirect($this->generateUrl('
				client_show', array('id'=>$id))
			);*/
		}

		return $this->render(
		    'VinsUserBundle:Client:edit.html.twig',
		    array('client' => $client,
		    	'edit_form' => $editForm->createView()
		    	)
		);

	}
}


