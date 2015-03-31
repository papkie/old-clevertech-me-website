<?php

namespace CleverTech\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/portfolio")
 */
class PortfolioController extends Controller
{
    /**
     * @Route("/list", name="portfolioList")
     * @Template()
     */
    public function listAction()
    {
        $projects = $this->getDoctrine()->getRepository('CleverTechFrontBundle:Portfolio')->findAllByDate();
        
        return compact('projects');  
    }

    /**
     * @Route("/detailsView", name="portfolioDetails")
     * @Template()
     */
    public function detailsAction()
    {
        return array(
                // ...
            );    
    }
    
    /**
     * @Route("/details/{id}")
     * @todo Zrobić zwracanie w api i obsługe w js
     */
    public function detailsAjaxAction($id) {
        
        $projectEntity = $this->getDoctrine()->getRepository('CleverTechFrontBundle:Portfolio')->find($id);
        if ($projectEntity)
            $project = [
                'name' => $projectEntity->getName(),
                'description' => $projectEntity->getDescription(),
                'shortDescription' => $projectEntity->getShortDescription(),
                'clientName' => $projectEntity->getClientName(),
                'clientUrl' => $projectEntity->getClientUrl(),
                'done' => $projectEntity->getDone()->format('Y-m-d'),
                'image' => $this->get('liip_imagine.cache.manager')->getBrowserPath('img/portfolio/'.$projectEntity->getFilename(), 'large_project'),
            ];
        return new JsonResponse(array('project' => $project));
    }

}
