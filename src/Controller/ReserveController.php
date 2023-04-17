<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\ReserveRepository;
use App\Repository\UserRepository;

#[Route('/reserve', name: 'reserve_')]
class ReserveController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ReserveRepository $reserveRepository ): Response
    {
        
        
        $reservations  = $reserveRepository->findBy(['user' => $this->getUser()]);

        
    
        return $this->render('reserve/index.html.twig', [
            'reservations' => $reservations,
        ]);
    }
    }

