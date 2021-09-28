<?php

namespace App\Controller;
use App\Entity\Prof;
use App\Form\ProfType;
use App\Repository\ProfRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("prof/create", name="create_prof")
     */
    public function index(Request $request,EntityManagerInterface $em): Response
    {   
        $prof = new Prof;
        $formulaire= $this->createForm(ProfType::class,$prof);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()){
            //j'insere la donnée
            $em->persist($prof);
            $em->flush();

            return $this->redirectToRoute('home');

        }else{
                return $this->render('prof/addProf.html.twig', [
                    'formulaire' => $formulaire->createView()
                ]);   
            }
    }

}
