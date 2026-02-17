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
    public ?string $lastName = null;

    #[ORM\Column]
    public ?string $firstName = null;

    #[ORM\Column]
    public ?string $nationality = null;

    #[ORM\Column]
    public ?int $birthyear = null;

    #[ORM\Column]
    public ?string $favoriteTrick = null;

    #[ORM\Column]
    public ?bool $winSLS = null;

    public function getFullName(): string
    {
        return $this->firstName.' '.$this->lastName;
    }

    public static function create(
        string $firstName,
        string $lastName,
        string $nationality,
        int $birthyear,
        string $favoriteTrick,
        bool $slsWin,
    ): self {
        $newSkater = new Skater();
        $newSkater->lastName = $lastName;
        $newSkater->firstName = $firstName;
        $newSkater->nationality = $nationality;
        $newSkater->birthyear = $birthyear;
        $newSkater->favoriteTrick = $favoriteTrick;
        $newSkater->winSLS = $slsWin;

        return $newSkater;
    }
}
