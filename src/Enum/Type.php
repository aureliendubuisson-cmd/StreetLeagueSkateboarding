<?php

namespace App\Enum;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

enum Type: string implements TranslatableInterface
{
    case STREET = 'Street';
    case PARK = 'Park';
    case MIX = 'Mix';

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return match ($this) {
            self::STREET => self::STREET->value,
            self::PARK => self::PARK->value,
            self::MIX => self::MIX->value,
        };
    }
}
