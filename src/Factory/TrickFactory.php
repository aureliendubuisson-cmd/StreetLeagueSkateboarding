<?php

namespace App\Factory;

use App\Entity\Trick;
use App\Enum\Level;
use App\Enum\Type;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

class TrickFactory extends PersistentObjectFactory
{
    public const array TRICKS = [
        'flip front',
        'flip back',
        'flip indy',
        'smith grind',
        'dark slide',
        'switch 360 flip',
        'backside nosegrind',
        'nollie hardflip',
        'fakie heelflip back',
        '50 50 front-shuvit out ',
    ];

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    #[\Override]
    public static function class(): string
    {
        return Trick::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[\Override]
    protected function defaults(): array|callable
    {
        $randomizeTricks = array_rand(self::TRICKS);
        $allTypes = Type::cases();
        $allLevels = Level::cases();

        return [
            'name' => self::TRICKS[$randomizeTricks],
            'type' => $allTypes[array_rand($allTypes)],
            'level' => $allLevels[array_rand($allLevels)],
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this;
    }
}
