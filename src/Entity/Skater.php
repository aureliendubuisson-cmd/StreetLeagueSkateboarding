<?php

namespace App\Entity;

use App\Repository\SkaterRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: SkaterRepository::class)]
#[UniqueEntity(fields: ['lastName', 'firstName', 'birthyear'], message: 'Ce skater existe déjà.')]
class Skater
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner le nom du skater.')]
    public ?string $lastName = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner le prénom du skater.')]
    public ?string $firstName = null;

    #[ORM\Column]
    #[Assert\Country(message: 'Ce pays n existe pas.')]
    #[Assert\NotBlank(message: 'Veuillez renseigner la nationalité du skater.')]
    public ?string $nationality = null;

    #[ORM\Column]
    #[Assert\GreaterThan(value: 1920, message: 'Ton skater est centenaire.')]
    #[Assert\NotBlank(message: 'Veuillez renseigner la date de naissance du skater.')]
    public ?int $birthyear = null;

    #[ORM\Column]
    public bool $winSLS = false;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    public ?Trick $favoriteTrick = null;

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
