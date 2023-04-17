<?php

namespace App\Controller;

use App\Entity\Graine;
use App\Repository\GraineRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/graine', name: 'graine_')]
class GraineController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(GraineRepository $graineRepository): Response
    {
        $graine = $graineRepository->findAll();

        return $this->render('graine/index.html.twig', [
            'graine' => $graine
        ]);
    }

    #[Route('/{id}', name: 'detail')]
    public function detail($id, Graine $graine, GraineRepository $graineRepository): Response
    {


        $graine = $graineRepository->find($id);
        return $this->render('graine/detail.html.twig', ['graine' => $graine]);
    }
}
