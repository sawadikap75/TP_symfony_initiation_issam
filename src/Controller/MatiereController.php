<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Form\MatiereType;
use App\Repository\MatiereRepository;
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
    public function createMat(Request $request,EntityManagerInterface $em): Response
    {   
        $matiere = new Matiere;
        $formulaire= $this->createForm(MatiereType::class,$matiere);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()){
            //j'insere la donnée
            $em->persist($matiere);
            $em->flush();

            return $this->redirectToRoute('home');

        }else{
                return $this->render('matiere/addMat.html.twig', [
                    'formulaire' => $formulaire->createView()
                ]);   
            }
    }

        /**
     * @Route("/matiere", name="matiere")
     */
    public function allMatiere(MatiereRepository $matiereRepository)
    {
        $matieres = $matiereRepository->findAll();

        return $this->render('matiere/listeMat.html.twig', ['matieres' => $matieres]);
    }

        /**
     * @Route("/matiere/{id}", name="one_matiere")
     */
    public function oneMatiere(Matiere  $matiere){
        return $this->render('matiere/oneMat.html.twig',['matiere' => $matiere]);
    }

    /**
     * @Route("/matiere/{id}/delete", name="delete_matiere")
     */
    public function delete(Matiere $matiere, EntityManagerInterface $em) {
        $em->remove($matiere);
        
        $em->flush();

        //return $this->redirectToRoute('liste_matiere');
    }



}
