<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToMany(targetEntity: Graine::class, inversedBy: 'paniers')]
    private Collection $graine;

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    private ?Commande $commande = null;

    public function __construct()
    {
        $this->graine = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
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

    /**
     * @return Collection<int, Graine>
     */
    public function getGraine(): Collection
    {
        return $this->graine;
    }

    public function addGraine(Graine $graine): self
    {
        if (!$this->graine->contains($graine)) {
            $this->graine->add($graine);
        }

        return $this;
    }

    public function removeGraine(Graine $graine): self
    {
        $this->graine->removeElement($graine);

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }
}
