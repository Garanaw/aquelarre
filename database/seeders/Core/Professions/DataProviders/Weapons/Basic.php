<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Weapons;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Profession\Domain\Dto\WeaponFluent;
use Database\Seeders\Contracts\DataProvider;

class Basic extends DataProvider
{
    public function getData(): array
    {
        /** @var ProfessionLoader $professions */
        $professions = $this->getLoadedLoader(class: ProfessionLoader::class);

        return collect([
            WeaponFluent::profession($professions->profession('alguacil'))->primary()->villain()->soldier(),
            WeaponFluent::profession($professions->profession('alguacil'))->villain()->soldier(),
            WeaponFluent::profession($professions->profession('almogavar'))->primary()->villain()->soldier(),
            WeaponFluent::profession($professions->profession('almogavar'))->villain()->soldier(),
            WeaponFluent::profession($professions->profession('bandido'))->primary()->villain()->soldier(),
            WeaponFluent::profession($professions->profession('caballero_de_orden_militar_hombre'))->quantity(2)->primary()->soldier()->noble(),
            WeaponFluent::profession($professions->profession('cazador'))->villain(),
            WeaponFluent::profession($professions->profession('clerigo'))->noble(),
            WeaponFluent::profession($professions->profession('comerciante'))->villain(),
            WeaponFluent::profession($professions->profession('comico'))->villain(),
            WeaponFluent::profession($professions->profession('cortesano'))->noble(),
            WeaponFluent::profession($professions->profession('curandero'))->villain(),
            WeaponFluent::profession($professions->profession('embaucador'))->villain(),
            WeaponFluent::profession($professions->profession('escriba'))->villain(),
            WeaponFluent::profession($professions->profession('ghazi'))->primary()->villain()->soldier()->noble(),
            WeaponFluent::profession($professions->profession('goliardo'))->villain(),
            WeaponFluent::profession($professions->profession('infanzon'))->primary()->quantity(2)->soldier()->noble(),
            WeaponFluent::profession($professions->profession('juglar'))->villain(),
            WeaponFluent::profession($professions->profession('ladron'))->villain(),
            WeaponFluent::profession($professions->profession('malsin'))->villain(),
            WeaponFluent::profession($professions->profession('marino'))->villain()->soldier(),
            WeaponFluent::profession($professions->profession('medico'))->villain(),
            WeaponFluent::profession($professions->profession('mediero'))->villain(),
            WeaponFluent::profession($professions->profession('mendigo'))->villain(),
            WeaponFluent::profession($professions->profession('muccadim'))->primary()->villain()->soldier(),
            WeaponFluent::profession($professions->profession('pardo'))->primary()->villain()->soldier(),
            WeaponFluent::profession($professions->profession('pirata'))->primary()->villain()->soldier(),
            WeaponFluent::profession($professions->profession('ramera'))->villain(),
            WeaponFluent::profession($professions->profession('siervo_de_corte'))->villain(),
            WeaponFluent::profession($professions->profession('soldado'))->primary()->villain()->soldier(),
            WeaponFluent::profession($professions->profession('trovador'))->noble(),
            WeaponFluent::profession($professions->profession('ulema'))->noble(),
        ])->toArray();
    }
}
