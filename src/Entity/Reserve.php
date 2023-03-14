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
    private ?atelier $atelier = null;

    #[ORM\ManyToOne(inversedBy: 'reserves')]
    private ?user $user = null;

 
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

    public function getAtelier(): ?atelier
    {
        return $this->atelier;
    }

    public function setAtelier(?atelier $atelier): self
    {
        $this->atelier = $atelier;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

   
}
