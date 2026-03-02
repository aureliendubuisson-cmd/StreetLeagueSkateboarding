<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class SkaterUnique extends Constraint
{
    public string $errorMessage = 'Ce skater existe déjà!';

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }
}
