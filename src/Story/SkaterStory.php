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
            'name' => 'Bilbon',
            'nationality' => 'France',
            'winSLS' => false,
            'birthyear' => 1985,
            'favoriteTrick' => 'flip front',
        ]);
        SkaterFactory::createOne([
            'name' => 'Oreste Hoth Guechot Dubuisson',
            'nationality' => 'France',
            'winSLS' => false,
            'birthyear' => 2017,
            'favoriteTrick' => 'slappy backside Boardslide',
        ]);
        SkaterFactory::createOne([
        'name' => 'Lou Hoth Guechot Dubuisson',
        'nationality' => 'France',
        'winSLS' => false,
        'birthyear' => 2023,
        'favoriteTrick' => 'to roll',
        ]);
        SkaterFactory::createOne([
            'name' => 'Vincent Milou',
            'nationality' => 'France',
            'winSLS' => true,
            'birthyear' => 1996,
            'favoriteTrick' => 'Flip to Frontside Lipslide',
        ]);
        SkaterFactory::createOne([
            'name' => 'Yuto Horigome',
            'nationality' => 'Japan',
            'winSLS' => true,
            'birthyear' => 1999,
            'favoriteTrick' => 'Nollie 270 Bluntslide',
        ]);
        SkaterFactory::createOne([
            'name' => 'Jamie Foy',
            'nationality' => 'America',
            'winSLS' => false,
            'birthyear' => 1996,
            'favoriteTrick' => 'Frontside Crooked-grind',
        ]);
    }
}
