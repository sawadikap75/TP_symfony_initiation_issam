<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Repository\ClasseRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClasseController extends AbstractController
{
    /**
     * @Route("/classe", name="classe")
     */
    public function index(ClasseRepository $classeRepository)
    {
        $classes = $classeRepository->findAll();

        return $this->render('classe/listeClasse.html.twig', ['classes' => $classes]);
    }

        /**
     * @Route("/classe/{id}", name="one_classe")
     */
    public function oneEleve(Classe $classe){

        return $this->render('/classe/detailClasse.html.twig',['classe' => $classe]);
    }


}


