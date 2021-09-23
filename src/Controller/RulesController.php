<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;




class RulesController extends AbstractController {
    
/**
 * @Route("/rules", name="rules")
 */
public function afficherRules():Response {
    $reponse=$this->render('rules.html.twig');
    return $reponse;
}


}