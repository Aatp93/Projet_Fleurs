<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Repository\CommandeRepository;
use App\Repository\GraineRepository;
use App\Repository\PanierRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/commande', name: 'commande_')]
class CommandeController extends AbstractController
{
    #[Route('/', name: 'liste')]
    public function liste(CommandeRepository $commandeRepository): Response
    {

        $commandes  = $commandeRepository->findBy(['user' => $this->getUser()]);
       

        return $this->render('commande/index.html.twig', [
            'commandes' => $commandes,
            'user' => $this->getUser(),
        ]);
    }
}
