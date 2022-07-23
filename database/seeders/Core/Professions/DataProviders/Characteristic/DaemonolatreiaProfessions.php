<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Characteristic;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Characteristic\CharacteristicsLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Database\Seeders\Contracts\DataProvider;

class DaemonolatreiaProfessions extends DataProvider
{
    public function getData(): array
    {
        $characteristics = $this->getLoadedLoader(CharacteristicsLoader::class);
        $professions = $this->getLoadedLoader(ProfessionLoader::class);

        return [
            [
                'profession_id' => $professions->profession('demonologo_religioso'),
                'characteristic_id' => $characteristics->culture(),
                'min_value' => 20,
            ],
            [
                'profession_id' => $professions->profession('demonologo_hechicero'),
                'characteristic_id' => $characteristics->culture(),
                'min_value' => 20,
            ],
        ];
    }
}
