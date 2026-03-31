<?php

namespace App\Story;

use App\Factory\TrickFactory;
use Zenstruck\Foundry\Story;

class TrickStory extends Story
{
    public function build(): void
    {
        TrickFactory::createMany(10);
    }
}
