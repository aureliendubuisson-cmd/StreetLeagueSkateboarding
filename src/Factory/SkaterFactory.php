<?php

namespace App\Factory;

use App\Entity\Skater;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Skater>
 */
final class SkaterFactory extends PersistentObjectFactory
{
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
        return [
            'birthyear' => self::faker()->dateTimeBetween('-40 years', '-18 years')->format('Y'),
            'favoriteTrick' => TrickFactory::random(),
            'firstName' => self::faker()->firstName(),
            'lastName' => self::faker()->lastName(),
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
