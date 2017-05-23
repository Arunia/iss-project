<?php

namespace Iss\ConferenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conferences = $em->getRepository('IssConferenceBundle:Conference')->findAll();

        return $this->render('IssConferenceBundle:Default:index.html.twig', array(
            'entities' => $conferences
        ));
    }

//    public function testAction(Request $request) {
//        $em = $this->getDoctrine()->getManager();
//
//        $tokenStorage = $this->get('security.token_storage');
//        $user = $tokenStorage->getToken()->getUser();
//        $user_id = $user->getId();
//        $conferences = $em->getRepository('IssConferenceBundle:Conference')->getConferencesForUser($user_id);
//
//        return $this->render('conference/index.html.twig', array(
//            'conferences' => $conferences,
//        ));
//    }

}
