<?php

namespace App\Entity;

use App\Repository\ReserveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReserveRepository::class)]
class Reserve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'reserves')]
    private ?user $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'reserves')]
    private ?Atelier $Atelier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getUtilisateur(): ?user
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?user $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getAtelier(): ?Atelier
    {
        return $this->Atelier;
    }

    public function setAtelier(?Atelier $Atelier): self
    {
        $this->Atelier = $Atelier;

        return $this;
    }
}
