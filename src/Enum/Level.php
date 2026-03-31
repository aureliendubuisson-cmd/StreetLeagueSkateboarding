<?php

namespace App\Enum;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

enum Level: string implements TranslatableInterface
{
    case EASY = 'Easy';
    case MEDIUM = 'Medium';
    case HARD = 'Hard';

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return match ($this) {
            self::EASY => self::EASY->value,
            self::MEDIUM => self::MEDIUM->value,
            self::HARD => self::HARD->value,
        };
    }
}
