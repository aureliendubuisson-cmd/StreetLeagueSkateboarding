<?php

namespace App\Entity;

use App\Enum\Level;
use App\Enum\Type;
use App\Repository\TrickRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TrickRepository::class)]
#[UniqueEntity(['name'], 'Ce trick existe déjà.')]
class Trick
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[Assert\NotNull]
    #[ORM\Column(length: 255)]
    public ?string $name = null;

    #[ORM\Column(length: 255)]
    public ?Type $type = null;
    #[ORM\Column(length: 255)]
    public ?Level $level = null;

    public function __toString(): string
    {
        return $this->name;
    }
}
