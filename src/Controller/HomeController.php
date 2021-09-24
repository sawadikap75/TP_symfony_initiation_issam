<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function afficherHome() {
    return $this->render('home.html.twig',['titre' => 'Accueil']);
    }

    /**
     * @Route("/rules", name="rules")
     */
    public function afficherRules() {
    return $this->render('rules.html.twig',['titre' => 'Règlement Intérieur']);       
    }


}


