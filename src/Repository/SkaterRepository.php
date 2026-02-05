<?php

namespace App\Repository;

use App\Model\Skater;

class SkaterRepository
{
    public function findall(): array
    {
        return [
            new Skater(
                1,
                'Vincent Milou',
                'French',
                1996,
                'Flip to Frontside Lipslide',
                true,
            ),

            new Skater(
                2,
                'Oreste Hoth Guechot Dubuisson',
                'French',
                2017,
                'Slappy backside Boardslide',
                false,
            ),

            new Skater(
                3,
                'Lou Hoth Guechot Dubuisson',
                'French',
                2023,
                'To roll',
                false,
            ),

            new Skater(
                4,
                'Jamie Foy',
                'American',
                1996,
                'Frontside Crooked-grind',
                false,
            ),

            new Skater(
                5,
                'Yuto Horigome',
                'Japan',
                1999,
                'Nollie 270 Bluntslide',
                true,
            ),
        ];
    }
}
