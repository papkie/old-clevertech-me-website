<?php

namespace CleverTech\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/worker")
 */
class WorkerController extends Controller
{
    /**
     * @Route("/list", name="workerList")
     * @Template()
     */
    public function listAction()
    {
        $workers = $this->getDoctrine()->getRepository('CleverTechFrontBundle:Worker')->findAll();
        return compact('workers');
    }
}
