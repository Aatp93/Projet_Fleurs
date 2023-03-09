<?php

namespace App\Entity;

use App\Repository\PosteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PosteRepository::class)]
class Poste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Create_At = null;

    #[ORM\ManyToOne(inversedBy: 'postes')]
    private ?User $User = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Actualite $actualite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->Create_At;
    }

    public function setCreateAt(\DateTimeImmutable $Create_At): self
    {
        $this->Create_At = $Create_At;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getActualite(): ?Actualite
    {
        return $this->actualite;
    }

    public function setActualite(?Actualite $actualite): self
    {
        $this->actualite = $actualite;

        return $this;
    }
}
