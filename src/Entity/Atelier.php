<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 500)]
    private ?string $img = null;

    #[ORM\OneToMany(mappedBy: 'Atelier', targetEntity: Reserve::class)]
    private Collection $reserves;

    public function __construct()
    {
        $this->reserves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return Collection<int, Reserve>
     */
    public function getReserves(): Collection
    {
        return $this->reserves;
    }

    public function addReserf(Reserve $reserf): self
    {
        if (!$this->reserves->contains($reserf)) {
            $this->reserves->add($reserf);
            $reserf->setAtelier($this);
        }

        return $this;
    }

    public function removeReserf(Reserve $reserf): self
    {
        if ($this->reserves->removeElement($reserf)) {
            // set the owning side to null (unless already changed)
            if ($reserf->getAtelier() === $this) {
                $reserf->setAtelier(null);
            }
        }

        return $this;
    }
}
