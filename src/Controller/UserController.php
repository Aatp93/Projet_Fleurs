<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route ('/profile', name: 'profile_')]
class UserController extends AbstractController
{
    #[Route('/', name: 'detail')]
    public function index(): Response
    {
     
        
        return $this->render('user/detail.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    #[Route('/abonne', name:'abonne')]
   public function abonnement( EntityManagerInterface $entityManagerInterface): Response 
    {
        // $user = $userRepository->find($id);
        $user = $this->getUser();
        $user->setRoles(['ROLE_ABONNE']);
        
        $entityManagerInterface->flush();
        return $this->render('user/detail.html.twig', [
            'user' => $this->getUser()
        ]);
    }
}