<?php

namespace App\Entity;

use App\Repository\SkaterRepository;
use App\Validator as AppAssert;
use Doctrine\ORM\Mapping as ORM;
use http\Message;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SkaterRepository::class)]
// #[UniqueEntity(fields: ['lastName', 'firstName', 'birthyear'], message: 'Ce skater existe déjà.')]
#[AppAssert\SkaterUnique]
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
    #[Assert\Positive(message: 'La date de naissance doit être positive.')]
    #[Assert\GreaterThan(value: 1920, message: 'Ton skater est centenaire.')]
    #[Assert\NotBlank(message: 'Veuillez renseigner la date de naissance du skater.')]
    public ?int $birthyear = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner le trick favori du skater.')]
    public ?string $favoriteTrick = null;

    #[ORM\Column]
    public bool $winSLS = false;

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
