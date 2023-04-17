<?php

namespace App\Controller;

use App\Entity\Graine;
use App\Entity\Panier;
use App\Entity\Commande;
use App\Repository\GraineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/panier', name: 'panier_')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'liste')]
    public function index(SessionInterface $session, GraineRepository $graineRepository): Response
    {

        $panier  = $session->get("panier", []);
        $detailPanier = [];
        $total = 0;

        foreach ($panier as $id => $quantite) {
            $graine = $graineRepository->find($id);
            $detailPanier[] = [
                "graine" => $graine->getNom(),
                "quantite" => $quantite,
                "prix" => $graine->getPrix(),
                "id" => $graine->getId()

            ];
            $total += $graine->getPrix() * $quantite;
        }

        return $this->render('panier/index.html.twig', [
            'total' => $total,
            'detailPanier' => $detailPanier,

        ]);
    }

    #[Route('/add/{id}', name: 'add')]
    public function add($id, SessionInterface $session, Graine $graine): Response
    {

        $panier = $session->get("panier", []);
        $id = $graine->getId();

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }


        $session->set("panier", $panier);
        return $this->redirectToRoute("panier_liste");
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove($id, SessionInterface $session, Graine $graine): Response
    {
        $panier = $session->get("panier", []);
        $id = $graine->getId();

        if (!empty($panier[$id])) {
            if ($panier[$id] > 1) {
                $panier[$id]--;
            } else {
                unset($panier[$id]);
            };
        }

        $session->set("panier", $panier);
        return $this->redirectToRoute("panier_liste");
    }

    #[Route('/valider', name: 'valider')]
    public function commande(SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        $panier = $session->get('panier', []);


        if (empty($panier)) {
            return $this->redirectToRoute('panier_liste');
        }

        $commandes = new Commande();
        $commandes->setUser($this->getUser());
        $commandes->setCreatedAt(new \DateTimeImmutable());
        $entityManager->persist($commandes);
        foreach ($panier as $id => $quantite) {
            $graine = $entityManager->getRepository(Graine::class)->find($id);

            if (!$graine) {
                throw $this->createNotFoundException('Cette graine n\'existe pas');
            }

            $panier = new Panier();
            $panier->setCommande($commandes);
            $panier->setGraine($graine);
            $panier->setQuantite($quantite);
            $panier->setPrix($graine->getPrix() * $quantite);
            $entityManager->persist($panier);
        }

        $entityManager->flush();

        $session->remove('panier');

        // return $this->render('user/detail.html.twig', ['commandes' => $commandes]);
        return $this->redirectToRoute("profile_detail");
    }
}
