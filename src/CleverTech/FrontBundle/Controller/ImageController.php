<?php

namespace CleverTech\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends Controller
{
	
	/**
	 * @Route("/image/show", name="showImage") 
	 * 
	 * @param Request $request
	 * @param unknown $id
	 */
	public function showAction(Request $request, $id) {
		$imageRepo = $this->getDoctrine()->getRepository('PapkieFrontBundle:Portfolio');
		
		var_dump($imageRepo->findOneBy(array('id' => $id)));
		die;
		
	}
}
