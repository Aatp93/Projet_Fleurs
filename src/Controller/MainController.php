<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use App\Repository\AtelierRepository;
use App\Repository\GraineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ActualiteRepository $actualiteRepository, GraineRepository $graineRepository, AtelierRepository $atelierRepository): Response
    {
        $actualite = $actualiteRepository->findOneBy([], ['id' => 'DESC']);

        $lastgraine = $graineRepository->findOneBy([],['id' => 'DESC'] );

        $graines = $graineRepository->findAll();
        $graine = $graines[rand(0, count($graines) - 1)];

        $atelier = $atelierRepository->findOneBy([],['id' => 'DESC']);

        return $this->render('app/index.html.twig', [
            'actualite' => $actualite,
            'graine' => $graine,
            'atelier' => $atelier,
            'lastGraine' => $lastgraine

        ]);
    }
}
