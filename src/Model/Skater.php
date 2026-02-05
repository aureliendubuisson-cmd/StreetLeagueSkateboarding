<?php

namespace App\Model;

class Skater
{
    public function __construct(
        public int $id,
        public string $name,
        public string $nationality,
        public int $birthyear,
        public string $favoriteTrick,
        public bool $winSLS,
    ) {
    }
}
