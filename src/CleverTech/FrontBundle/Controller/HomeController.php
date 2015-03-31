<?php

namespace CleverTech\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller {

    /**
     * @Route("/")
     * @Template("CleverTechFrontBundle:Home:index.html.twig")
     */
    public function indexAction() {
        $title = 'CleverTech';
        $subtitle = 'Najlepsze rozwiązania';
        return compact('title', 'subtitle');
    }

    /**
     * @Route("/about")
     * @Template()
     */
    public function aboutAction() {
        return array(
                // ...
        );
    }

}
