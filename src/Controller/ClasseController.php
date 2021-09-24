<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClasseController extends AbstractController{
    /**
     * @Route("/classe", name="classe")
     */
    public function index(): Response
    {
        $repository=$this->getDoctrine()->getRepository(Classe::class);
        $classes=$repository->findAll() ;

        return $this->render('classe/index.html.twig', [
            'produits' =>$classes
        ]);
    }
}
