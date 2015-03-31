<?php

namespace CleverTech\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;

class MailController extends Controller
{
    /**
     * @Route("/mail")
     */
    public function indexAction(Request $request)
    {
        
        $name = $request->request->get('name');
        $subject = $request->request->get('subject');
        $phone = $request->request->get('phone');        
        $email = $request->request->get('email');
        $text = $request->request->get('message');

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($email, $name)
            ->setTo('papkie@clevertech.me')
            ->setBody(
                $this->renderView(
                    'CleverTechFrontBundle:Mail:contact.html.twig',
                    compact('name', 'email', 'phone', 'text')
                ), 'text/html'
            )
        ;
        $this->get('mailer')->send($message);
        $response = new Response();
        $response->setContent(json_encode(array(
            'status' => true
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
