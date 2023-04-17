<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actualite', name: 'actualite_')]
class ActualiteController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ActualiteRepository $actualiteRepository): Response
    {
        
        $actualite = $actualiteRepository->findby([], ['id' => 'DESC']);
        return $this->render('actualite/index.html.twig', [
            'actualite' => $actualite,
        ]);
    }


    #[Route('/{id}', name: 'detail')]
    public function detail($id, Actualite $actualite, ActualiteRepository $actualiteRepository): Response
    {   
        $actualite = $actualiteRepository->find($id);
        return $this->render('actualite/detail.html.twig', ['actualite' => $actualite]);
    }
}
