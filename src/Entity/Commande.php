<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?user $user = null;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: panier::class)]
    private Collection $panier;

    public function __construct()
    {
        $this->panier = new ArrayCollection();
    }

   




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

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

    /**
     * @return Collection<int, panier>
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(panier $panier): self
    {
        if (!$this->panier->contains($panier)) {
            $this->panier->add($panier);
            $panier->setCommande($this);
        }

        return $this;
    }

    public function removePanier(panier $panier): self
    {
        if ($this->panier->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getCommande() === $this) {
                $panier->setCommande(null);
            }
        }

        return $this;
    }

   

}
