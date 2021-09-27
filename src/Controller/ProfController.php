<?php

namespace App\Controller;

use App\Entity\Prof;
use App\Repository\ProfRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfController extends AbstractController
{  /**
     * @Route("/prof", name="all_profs")
     */
    public function allProfs(ProfRepository $profRepository)
    {
        $profs=$profRepository->findAll();
        return $this->render('/prof/index.html.twig', ['profs'=> $profs
        ]);
    }

    /**
     * @Route("/prof/{id}", name="one_prof")
     */
    public function oneProf(Prof $prof){
        return $this->render('prof/detailsProf.html.twig',['prof' => $prof]);
    }
}
