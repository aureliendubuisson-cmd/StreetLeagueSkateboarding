<?php

namespace App\Story;

use App\Factory\SkaterFactory;
use Zenstruck\Foundry\Attribute\AsFixture;
use Zenstruck\Foundry\Story;

#[AsFixture(name: 'main')]
final class SkaterStory extends Story
{
    public function build(): void
    {
        SkaterFactory::createMany(100);
        SkaterFactory::createOne([
            'firstName' => 'Bilbon',
            'lastName' => 'Dubuisson',
            'nationality' => 'France',
            'winSLS' => false,
            'birthyear' => 1985,
            'favoriteTrick' => 'Flip front',
        ]);
        SkaterFactory::createOne([
            'firstName' => 'Oreste',
            'lastName' => 'Hoth Guechot Dubuisson',
            'nationality' => 'France',
            'winSLS' => false,
            'birthyear' => 2017,
            'favoriteTrick' => 'Slappy backside boardslide',
        ]);
        SkaterFactory::createOne([
            'firstName' => 'Lou',
            'lastName' => 'Hoth Guechot Dubuisson',
            'nationality' => 'France',
            'winSLS' => false,
            'birthyear' => 2023,
            'favoriteTrick' => 'To roll',
        ]);

        SkaterFactory::createOne([
            'firstName' => 'Vincent',
            'lastName' => 'Milou',
            'nationality' => 'France',
            'winSLS' => true,
            'birthyear' => 1996,
            'favoriteTrick' => 'Flip to frontside lipslide',
        ]);
        SkaterFactory::createOne([
            'firstName' => 'Yuto',
            'lastName' => 'Horigome',
            'nationality' => 'Japan',
            'winSLS' => true,
            'birthyear' => 1999,
            'favoriteTrick' => 'Nollie 270 bluntslide',
        ]);
        SkaterFactory::createOne([
            'firstName' => 'Jamie',
            'lastName' => 'Foy',
            'nationality' => 'America',
            'winSLS' => false,
            'birthyear' => 1996,
            'favoriteTrick' => 'Frontside crooked-grind',
        ]);
    }
}
