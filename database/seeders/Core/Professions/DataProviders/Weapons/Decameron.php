<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Weapons;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Profession\Domain\Dto\WeaponFluent;
use Database\Seeders\Contracts\DataProvider;

class Decameron extends DataProvider
{
    public function getData(): array
    {
        /** @var ProfessionLoader $professions */
        $professions = $this->getLoadedLoader(class: ProfessionLoader::class);

        return collect([
            WeaponFluent::profession($professions->profession('alfaqueque'))->villain(),
            WeaponFluent::profession($professions->profession('frontero'))->villain()->soldier()->noble(),
            WeaponFluent::profession($professions->profession('rastrero'))->villain()->soldier()->noble(),
            WeaponFluent::profession($professions->profession('tornadizo'))->villain()->soldier()->noble(),
        ])->toArray();
    }
}
