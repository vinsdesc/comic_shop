<?php

namespace Vins\Platform\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vins\Platform\Bundle\Entity\Comic;
use Vins\Platform\Bundle\Form\ComicType;
use Vins\Platform\Bundle\Entity\ArtistComic;
use Vins\Platform\Bundle\Form\ArtistComicType;
use Vins\Platform\Bundle\Form\ComicResearchType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



/**
 * Comic controller.
 *
 * @Route("/comic")
 */
class ComicController extends Controller
{

    /**
     * Lists all Comic entities.
     *
     * @Route("/", name="comic")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comics = $em->getRepository('VinsPlatformBundle:Comic')->findAll();
        $paginator  = $this->get('knp_paginator')
            ->paginate( $comics, $request->query->getInt('page', 1),9
        );

        return array(
            
            'comics' => $paginator
        );
    }
   

    /**
     * Creates a new Comic entity.
     *
     * @Route("/comic/new", name="comic_new")
     * @Method("POST")
     * @Template("VinsPlatformBundle:Comic:new.html.twig")
     */
   
    /**
     * @Security("has_role('ROLE_PUBLISHER')")
     */
    public function createAction(Request $request)
    {
        $entity = new Comic();
        $form = $this->createForm(new ComicType(), $entity);
        $form->add('submit', 'submit', array('label' => 'Create'));

        $form->handleRequest($request);
       
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comic_show', array('id' => $entity->getId())));
        }

        return $this->render(
            'VinsPlatformBundle:Comic:new.html.twig',array(
            'entity' => $entity,
            'form'   => $form->createView(),
            )
        );
    }

  

   
    /**
     * Finds and displays a Comic entity.
     *
     * @Route("/{id}", name="comic_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VinsPlatformBundle:Comic')->getComicsWithAllInformations($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comic entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Comic entity.
     *
     * @Route("/comic/edit/{id}", name="comic_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VinsPlatformBundle:Comic')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comic entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('comic_show', array('id' => $id)));
        }
        else {
            foreach ($editForm->getIterator() as $key => $child) {
                if ($child instanceof Form) {
                    foreach ($child->getErrors() as $error) {
                        $errors[$key] = $error->getMessage();
                    }
                    var_dump($errors);
                }
            }
        }

        return $this->render(
            'VinsPlatformBundle:Comic:edit.html.twig',
           array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Comic entity.
    *
    * @param Comic $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Comic $entity)
    {
        $form = $this->createForm(new ComicType(), $entity);
        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
   

   
    /**
     * Deletes a Comic entity.
     *
     * @Route("/{id}", name="comic_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VinsPlatformBundle:Comic')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comic entity.');
            }
           
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comic'));
    }

    /**
     * Creates a form to delete a Comic entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comic_delete', array('id' => $id)))
            ->setMethod('DELETE')
             ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }



    public function researchAction(Request $request) 
    {
        $form = $this->createForm(new ComicResearchType());
     
        return $this->render('VinsPlatformBundle:Comic:research.html.twig', 
            array('form' => $form->createView()))
        ;
    }

    public function resultsAction(Request $request)
    {
        
        $form = $this->createForm(new ComicResearchType());
        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $comics = $em->getRepository('VinsPlatformBundle:Comic')->research($form['research']->getData());
           
           return $this->render('VinsPlatformBundle:Comic:comicfound.html.twig',array('comics' => $comics));
        }
    
    }


    public function getLastAction()
    {
         $em = $this->getDoctrine()->getManager();
        $comics = $entity = $em->getRepository('VinsPlatformBundle:Comic')->getThe3Last();
        return $this->render('VinsPlatformBundle:Comic:last.html.twig', array('comics'=>$comics));
    }

    public function infoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $comic = $em->getRepository('VinsPlatformBundle:Comic')->find($id);
        return $this->render(
            'VinsPlatformBundle:Comic:client_list.html.twig',
            array('comic' => $comic)
        );
    }

    public function browseAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comics= $em->getRepository('VinsPlatformBundle:Comic')->findAll();
        $paginator  = $this->get('knp_paginator')
            ->paginate( $comics, $request->query->getInt('page', 1),9
        );
        return $this->render('VinsPlatformBundle:Comic:browse.html.twig', array('comics'=> $paginator));
    }
    
   }
