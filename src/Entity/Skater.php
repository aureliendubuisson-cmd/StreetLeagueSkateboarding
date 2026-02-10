<?php

namespace App\Entity;

use App\Repository\SkaterEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkaterEntityRepository::class)]
class Skater
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nationality = null;

    #[ORM\Column(nullable: true)]
    private ?int $birthyear = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $favoriteTrick = null;

    #[ORM\Column(nullable: true)]
    private ?bool $winSLS = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getBirthyear(): ?int
    {
        return $this->birthyear;
    }

    public function setBirthyear(?int $birthyear): static
    {
        $this->birthyear = $birthyear;

        return $this;
    }

    public function getFavoriteTrick(): ?string
    {
        return $this->favoriteTrick;
    }

    public function setFavoriteTrick(?string $favoriteTrick): static
    {
        $this->favoriteTrick = $favoriteTrick;

        return $this;
    }

    public function isWinSLS(): ?bool
    {
        return $this->winSLS;
    }

    public function setWinSLS(?bool $winSLS): static
    {
        $this->winSLS = $winSLS;

        return $this;
    }
}
