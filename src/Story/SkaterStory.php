<?php

namespace App\Story;

use App\Factory\SkaterFactory;
use App\Repository\TrickRepository;
use Zenstruck\Foundry\Attribute\AsFixture;
use Zenstruck\Foundry\Story;

#[AsFixture(name: 'main')]
final class SkaterStory extends Story
{
    public function __construct(private readonly TrickRepository $trickRepository)
    {
    }

    public function build(): void
    {
        $flipFront = $this->trickRepository->findOneBy(['name' => 'flip front']);
        $flipBack = $this->trickRepository->findOneBy(['name' => 'flip back']);
        $flipIndy = $this->trickRepository->findOneBy(['name' => 'flip indy']);

        SkaterFactory::createMany(100);
        SkaterFactory::createOne([
            'firstName' => 'Bilbon',
            'lastName' => 'Dubuisson',
            'nationality' => 'France',
            'winSLS' => false,
            'birthyear' => 1985,
            'favoriteTrick' => $flipFront,
        ]);
        SkaterFactory::createOne([
            'firstName' => 'Oreste',
            'lastName' => 'Hoth Guechot Dubuisson',
            'nationality' => 'France',
            'winSLS' => false,
            'birthyear' => 2017,
            'favoriteTrick' => $flipBack,
        ]);
        SkaterFactory::createOne([
            'firstName' => 'Lou',
            'lastName' => 'Hoth Guechot Dubuisson',
            'nationality' => 'France',
            'winSLS' => false,
            'birthyear' => 2023,
            'favoriteTrick' => $flipIndy,
        ]);

        SkaterFactory::createOne([
            'firstName' => 'Vincent',
            'lastName' => 'Milou',
            'nationality' => 'France',
            'winSLS' => true,
            'birthyear' => 1996,
            'favoriteTrick' => $flipFront,
        ]);
        SkaterFactory::createOne([
            'firstName' => 'Yuto',
            'lastName' => 'Horigome',
            'nationality' => 'Japan',
            'winSLS' => true,
            'birthyear' => 1999,
            'favoriteTrick' => $flipBack,
        ]);
        SkaterFactory::createOne([
            'firstName' => 'Jamie',
            'lastName' => 'Foy',
            'nationality' => 'America',
            'winSLS' => false,
            'birthyear' => 1996,
            'favoriteTrick' => $flipIndy,
        ]);
    }
}
