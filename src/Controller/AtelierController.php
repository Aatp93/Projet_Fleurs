<?php

namespace App\Controller;

use App\Entity\Atelier;
use App\Repository\AtelierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/atelier', name: 'atelier_')]
class AtelierController extends AbstractController
{
    #[Route('/', name: 'liste')]
    public function liste(AtelierRepository $atelierRepository): Response
    {
        $atelier = $atelierRepository->findAll();
        return $this->render('atelier/liste.html.twig', [
            'atelier' => $atelier,
        ]);
    }

    #[Route('/{id}', name: 'detail')]
    public function detail($id, Atelier $atelier, AtelierRepository $atelierRepository): Response
    {
        $atelier = $atelierRepository->find($id);
        return $this->render('atelier/detail.html.twig', ['atelier' => $atelier]);
    }
}
