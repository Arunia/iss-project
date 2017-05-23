<?php

namespace Iss\ConferenceBundle\Controller;

use Iss\ConferenceBundle\Entity\Conference;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Conference controller.
 *
 */
class ConferenceController extends Controller
{
    /**
     * Lists all conference entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conferences = $em->getRepository('IssConferenceBundle:Conference')->findAll();

        return $this->render('conference/index.html.twig', array(
            'conferences' => $conferences,
        ));
    }

    public function listMyConferencesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        $conferences = $em->getRepository('IssConferenceBundle:Conference')->getConferencesForUser($userId);

        return $this->render('IssConferenceBundle:Director:my.html.twig', array(
            'entities' => $conferences,
        ));
    }

    /**
     * Creates a new conference entity.
     *
     */
    public function newAction(Request $request)
    {
        $conference = new Conference();
        $form = $this->createForm('Iss\ConferenceBundle\Form\ConferenceType', $conference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conference);
            $em->flush();

            return $this->redirectToRoute('conference_show', array('id' => $conference->getId()));
        }

        return $this->render('conference/new.html.twig', array(
            'conference' => $conference,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a conference entity.
     *
     */
    public function showAction(Conference $conference)
    {
//        $deleteForm = $this->createDeleteForm($conference);

        return $this->render('IssConferenceBundle:Conference:conference.html.twig', array(
            'conference' => $conference,
//            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing conference entity.
     *
     */
    public function editAction(Request $request, Conference $conference)
    {
        $deleteForm = $this->createDeleteForm($conference);
        $editForm = $this->createForm('Iss\ConferenceBundle\Form\ConferenceType', $conference);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conference_edit', array('id' => $conference->getId()));
        }

        return $this->render('IssConferenceBundle:Conference:edit.html.twig', array(
            'conference' => $conference,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a conference entity.
     *
     */
    public function deleteAction(Request $request, Conference $conference)
    {
        $form = $this->createDeleteForm($conference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($conference);
            $em->flush();
        }

        return $this->redirectToRoute('conference_index');
    }

    /**
     * Creates a form to delete a conference entity.
     *
     * @param Conference $conference The conference entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Conference $conference)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conference_delete', array('id' => $conference->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
