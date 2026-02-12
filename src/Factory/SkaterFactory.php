<?php

namespace App\Factory;

use App\Entity\Skater;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Skater>
 */
final class SkaterFactory extends PersistentObjectFactory
{
    public const array REAL_TRICKS = [
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
    public function __construct()
    {
    }

    #[\Override]
    public static function class(): string
    {
        return Skater::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[\Override]
    protected function defaults(): array|callable
    {
        $randomizeKey = array_rand(self::REAL_TRICKS);

        return [
            'birthyear' => self::faker()->dateTimeBetween('-40 years', '-18 years')->format('Y'),
            'favoriteTrick' => self::REAL_TRICKS[$randomizeKey],
            'name' => self::faker()->name(),
            'nationality' => self::faker()->country(),
            'winSLS' => self::faker()->boolean(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Skater $skater): void {})
        ;
    }
}
