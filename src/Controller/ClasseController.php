<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClasseType;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
     /**
     * @Route("/classe/{id}/delete", name="delete_classe")
     */
    public function delete(Classe $classe, EntityManagerInterface $em) {
        $em->remove($classe);
        $em->flush();

        return $this->redirectToRoute('/classe/liste_classe');
    }

      /**
     * @Route("/classe/add", name="create_classe")
     */
    public function createClasse(Request $request, EntityManagerInterface $em): Response {
        $classe = new Classe;
        $formulaire = $this->createForm(ClasseType::class, $classe);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            // J'insère
            $em->persist($classe);
            $em->flush();

            return $this->redirectToRoute('liste_classe');
        } else {
            return $this->render('/classe/add.html.twig', [
                'formulaire' => $formulaire->createView()
            ]);
        }
    }


}


