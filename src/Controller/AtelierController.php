<?php

namespace App\Controller;

use App\Entity\Atelier;
use App\Entity\Reserve;
use App\Repository\AtelierRepository;
use App\Repository\ReserveRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/atelier', name: 'atelier_')]
class AtelierController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function liste(AtelierRepository $atelierRepository): Response
    {
        $atelier = $atelierRepository->findAll();
        return $this->render('atelier/index.html.twig', [
            'atelier' => $atelier,
        ]);
    }

    #[Route('/{id}', name: 'detail')]
    public function detail($id, Atelier $atelier, AtelierRepository $atelierRepository): Response
    {
        $atelier = $atelierRepository->find($id);
        return $this->render('atelier/detail.html.twig', ['atelier' => $atelier]);
    }

    #[Route ('/reserve/{id}' , name: 'reserve' )]
    public function reserveAtelier(Atelier $atelier, EntityManagerInterface $entityManager, ReserveRepository $reserveRepository): Response
{
    // Check if user already has a reservation for this atelier
    $existingReservation = $reserveRepository->findOneBy([
        'user' => $this->getUser(),
        'atelier' => $atelier,
    ]);

    if ($existingReservation) {
        return $this->redirectToRoute('app_main');
    }

    // Create new reservation
    $reservation = new Reserve();
    $reservation->setAtelier($atelier);
    $reservation->setUser($this->getUser());
    $reservation->setQuantite(1);

    
    $entityManager->persist($reservation);
    $entityManager->flush();
    return $this->render('reservation/index.html.twig', [
        'reservation' => $reservation,
        'existingReservation' => $existingReservation
    ]);
}
}
