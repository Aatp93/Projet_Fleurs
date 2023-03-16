<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route ('/profile', name: 'profile_')]
class UserController extends AbstractController
{
    #[Route('/{id}', name: 'detail')]
    public function index($id, User $user, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        return $this->render('user/detail.html.twig', [
            'user' => $user
        ]);
    }
}
