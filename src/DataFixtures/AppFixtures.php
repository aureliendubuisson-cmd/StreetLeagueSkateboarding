<?php

namespace App\DataFixtures;

use App\Story\SkaterStory;
use App\Story\TrickStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        TrickStory::load();
        SkaterStory::load();
    }
}
