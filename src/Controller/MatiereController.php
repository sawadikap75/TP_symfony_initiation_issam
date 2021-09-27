<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Form\MatiereType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MatiereController extends AbstractController
{
    /**
     * @Route("/matiere/create", name="create_matiere")
     */
    public function index(Request $request,EntityManagerInterface $em): Response
    {   
        $matiere = new Matiere;
        $formulaire= $this->createForm(MatiereType::class,$matiere);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()){
            //j'insere la donnée
            $em->persist($matiere);
            $em->flush();

            $this->redirectToRoute('home');

        }else{
                return $this->render('matiere/addMat.html.twig', [
                    'formulaire' => $formulaire->createView(),
                ]);   
            }
    }
}
