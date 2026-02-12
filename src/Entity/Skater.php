<?php

namespace App\Entity;

use App\Repository\SkaterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkaterRepository::class)]
class Skater
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column]
    public ?string $name = null;

    #[ORM\Column]
    public ?string $nationality = null;

    #[ORM\Column]
    public ?int $birthyear = null;

    #[ORM\Column]
    public ?string $favoriteTrick = null;

    #[ORM\Column]
    public ?bool $winSLS = null;
}
