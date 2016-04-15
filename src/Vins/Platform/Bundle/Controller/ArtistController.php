<?php

namespace Vins\Platform\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vins\Platform\Bundle\Entity\Artist;
use Vins\Platform\Bundle\Form\ArtistType;

/**
 * Artist controller.
 *
 * @Route("/artist")
 */
class ArtistController extends Controller
{

    /**
     * Lists all Artist entities.
     *
     * @Route("/artist", name="artist")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $artists = $em->getRepository('VinsPlatformBundle:Artist')->findAll();
         $paginator  = $this->get('knp_paginator')
            ->paginate( $artists, $request->query->getInt('page', 1),5
        );
        return array(
            'artists' => $paginator,
        );


    }


    /**
     * Creates a new Artist entity.
     *
     * @Route("/artist/new", name="artist_create")
     * @Method("POST")
     * @Template("VinsPlatformBundle:Artist:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Artist();
        $form =  $this->createForm(new ArtistType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Create'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('artist_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    

   

    /**
     * Finds and displays a Artist entity.
     *
     * @Route("/artist/show/{id}", name="artist_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VinsPlatformBundle:Artist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Artist entity.
     *
     * @Route("/artist/edit/{id}", name="artist_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VinsPlatformBundle:Artist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artist entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('artist_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Artist entity.
    *
    * @param Artist $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Artist $entity)
    {
        $form = $this->createForm(new ArtistType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
   
    /**
     * Deletes a Artist entity.
     *
     * @Route("artist/delete/{id}", name="artist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VinsPlatformBundle:Artist')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Artist entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('artist'));
    }

    /**
     * Creates a form to delete a Artist entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artist_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
