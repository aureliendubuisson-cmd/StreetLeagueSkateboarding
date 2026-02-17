<?php

declare(strict_types=1);

namespace App\Twig;

use App\Entity\Skater;
use App\Repository\SkaterRepository;
use Twig\Attribute\AsTwigFilter;

class SkaterAgeExtension
{
    public function __construct(
        public readonly SkaterRepository $skaterRepository,
    ) {
    }

    #[AsTwigFilter('is_younger_skater')]
    public function isYoungerSkater(Skater $mySkater): bool
    {
        $skaters = $this->skaterRepository->findAll();

        return !array_any($skaters, fn (Skater $skater) => $mySkater->birthyear < $skater->birthyear);
    }
}
