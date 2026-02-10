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
    public ?int $id = null;

    #[ORM\Column(length: 255, nullable: false)]
    public ?string $name = null;

    #[ORM\Column(length: 255, nullable: false)]
    public ?string $nationality = null;

    #[ORM\Column(nullable: false)]
    public ?int $birthyear = null;

    #[ORM\Column(length: 255, nullable: false)]
    public ?string $favoriteTrick = null;

    #[ORM\Column(nullable: false)]
    public ?bool $winSLS = null;
}
