<?php

namespace Vins\Platform\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vins\Platform\Bundle\Entity\Cart;
use Vins\Platform\Bundle\Form\CartType;

class CartController extends Controller
{
	public function indexAction()
	{
	    $em = $this->getDoctrine()->getManager();
	    $carts = $em->getRepository('VinsPlatformBundle:Cart')->findAll();
	    return $this->render('VinsPlatformBundle:Cart:index.html.twig',	array(
	    		'carts' => $carts,
	    	));
	}

	public function createAction(Request $request)
	{
	    $cart = new Cart();
	    $form = $this->createForm(new CartType(), $cart);
	    $form->add('submit', 'submit', array('label' => 'Create'));
	    $form->handleRequest($request);

	    if($form->isValid())
	    {
	    	$em = $this->getDoctrine()->getManager();
	    	$em->persist($cart);
	    	$em->flush();
	    	return $this->redirect($this->generateUrl('cart_show', array(
	    		'id' => $cart->getId())
	    		)
	    	);
	    }
	    return $this->render('VinsPlatformBundle:Cart:new.html.twig', array('form' => $form->createView()));
	}

	public function deleteAction(Request $request, $id)
	{
	   
	   $form = $this->createFormBuilder()
			->setAction($this->generateUrl('cart_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit','submit', array('label'=> 'Delete'))
			->getForm();
       
       $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VinsPlatformBundle:Cart')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cart entity.');
            }
           
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cart'));
	}



	public function showAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$cart = $em->getRepository('VinsPlatformBundle:Cart')->getOneCartWithAllInformations($id);
		
		if(!$cart)
		{
			throw $this->createNotFoundException("Unable to find Cart Entity");
		}

		$deleteForm = $this->createDeleteForm($id);


	    return $this->render('VinsPlatformBundle:Cart:show.html.twig', 
	    	array(
		    	'cart'=> $cart,
		    	'delete_form'=>$deleteForm->createView()
	    	)
	    );
	}

	 public function editAction($id, Request $request)
    {
		$em = $this->getDoctrine()->getManager();
		$cart = $em->getRepository('VinsPlatformBundle:Cart')->find($id);

		if (!$cart) {
			throw $this->createNotFoundException('Unable to find the cart entity '.$id);
		}

		//forumlaire d'édition
		$editForm = $this->createForm(new CartType(), $cart);
		$editForm->add('submit', 'submit', array('label' => 'Update'));

		//formulaire de supression
		$deleteForm = $this->createDeleteForm($id);

		$editForm->handleRequest($request);
		if($editForm->isValid())
		{
			$em->flush();
			return $this->redirect($this->generateUrl('
				cart_edit', array('id'=>$id))
			);
		}

		return $this->render(
		    'VinsPlatformBundle:Cart:edit.html.twig',
		    array('cart' => $cart,
		    	'edit_form' => $editForm->createView(),
		    	'delete_form' => $deleteForm->createView(),
		    	)
		);

	}

	private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cart_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
