<?php

namespace App\Entity;

use App\Repository\SecteurActivitesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecteurActivitesRepository::class)]
class SecteurActivites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code_activites = null;

    #[ORM\Column(length: 255)]
    private ?string $activites = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeActivites(): ?string
    {
        return $this->code_activites;
    }

    public function setCodeActivites(string $code_activites): static
    {
        $this->code_activites = $code_activites;

        return $this;
    }

    public function getActivites(): ?string
    {
        return $this->activites;
    }

    public function setActivites(string $activites): static
    {
        $this->activites = $activites;

        return $this;
    }
}
