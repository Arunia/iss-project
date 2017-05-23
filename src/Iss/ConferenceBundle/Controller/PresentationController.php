<?php

namespace Iss\ConferenceBundle\Controller;

use Iss\ConferenceBundle\Entity\Presentation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Presentation controller.
 *
 */
class PresentationController extends Controller
{
    /**
     * Lists all presentation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();
        $presentations = $em->getRepository('IssConferenceBundle:Presentation')->findForUser($userId);

        return $this->render('IssConferenceBundle:Presentation:index.html.twig', array(
            'entities' => $presentations,
        ));
    }

    /**
     * Creates a new presentation entity.
     *
     */
    public function newAction(Request $request)
    {
        $presentation = new Presentation();
        $form = $this->createForm('Iss\ConferenceBundle\Form\PresentationType', $presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $presentation->setOwner($this->get('security.token_storage')->getToken()->getUser());
            $em->persist($presentation);
            $em->flush();

            return $this->redirectToRoute('presentation_show', array('id' => $presentation->getId()));
        }

        return $this->render('IssConferenceBundle:Presentation:new.html.twig', array(
            'presentation' => $presentation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a presentation entity.
     *
     */
    public function showAction(Presentation $presentation)
    {
        $deleteForm = $this->createDeleteForm($presentation);

        return $this->render('IssConferenceBundle:Presentation:show.html.twig', array(
            'presentation' => $presentation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing presentation entity.
     *
     */
    public function editAction(Request $request, Presentation $presentation)
    {
        $editForm = $this->createForm('Iss\ConferenceBundle\Form\PresentationType', $presentation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('presentation_edit', array('id' => $presentation->getId()));
        }

        return $this->render('IssConferenceBundle:Presentation:edit.html.twig', array(
            'presentation' => $presentation,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a presentation entity.
     *
     */
    public function deleteAction(Request $request, Presentation $presentation)
    {
        $form = $this->createDeleteForm($presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($presentation);
            $em->flush();
        }

        return $this->redirectToRoute('presentation_index');
    }

    /**
     * Creates a form to delete a presentation entity.
     *
     * @param Presentation $presentation The presentation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Presentation $presentation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presentation_delete', array('id' => $presentation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
