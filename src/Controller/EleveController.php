<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Repository\EleveRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EleveController extends AbstractController
{
    /**
     * @Route("/eleve", name="eleve")
     */
    public function allEleve(EleveRepository $eleveRepository)
    {
        $eleves = $eleveRepository->findAll();
        return $this->render('eleve/index.html.twig',['eleves' => $eleves]);


    }

    /**
     * @Route("/eleve/{id}", name="one_eleve")
     */
    public function oneEleve(Eleve $eleve){

        return $this->render('/eleve/eleveDetail.html.twig',['eleve' => $eleve]);
    }
}
