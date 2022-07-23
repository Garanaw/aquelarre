<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Characteristic;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Characteristic\CharacteristicsLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Database\Seeders\Contracts\DataProvider;

class DecameronProfessions extends DataProvider
{
    public function getData(): array
    {
        /** @var CharacteristicsLoader $characteristics */
        $characteristics = $this->getLoadedLoader(CharacteristicsLoader::class);
        /** @var ProfessionLoader $professions */
        $professions = $this->getLoadedLoader(ProfessionLoader::class);

        return [
            [
                'profession_id' => $professions->profession('alfaqueque'),
                'characteristic_id' => $characteristics->communication(),
                'min_value' => 20,
            ],
            [
                'profession_id' => $professions->profession('cabalista'),
                'characteristic_id' => $characteristics->perception(),
                'min_value' => 12,
            ],
            [
                'profession_id' => $professions->profession('cabalista'),
                'characteristic_id' => $characteristics->culture(),
                'min_value' => 20,
            ],
            [
                'profession_id' => $professions->profession('cantero'),
                'characteristic_id' => $characteristics->strength(),
                'min_value' => 15,
            ],
            [
                'profession_id' => $professions->profession('cantero'),
                'characteristic_id' => $characteristics->resistence(),
                'min_value' => 15,
            ],
            [
                'profession_id' => $professions->profession('cetrero'),
                'characteristic_id' => $characteristics->perception(),
                'min_value' => 20,
            ],
            [
                'profession_id' => $professions->profession('cetrero'),
                'characteristic_id' => $characteristics->communication(),
                'min_value' => 15,
            ],
            [
                'profession_id' => $professions->profession('frontero'),
                'characteristic_id' => $characteristics->resistence(),
                'min_value' => 20,
            ],
            [
                'profession_id' => $professions->profession('frontero'),
                'characteristic_id' => $characteristics->ability(),
                'min_value' => 15,
            ],
            [
                'profession_id' => $professions->profession('rastrero'),
                'characteristic_id' => $characteristics->perception(),
                'min_value' => 20,
            ],
            [
                'profession_id' => $professions->profession('rastrero'),
                'characteristic_id' => $characteristics->agility(),
                'min_value' => 15,
            ],

            [
                'profession_id' => $professions->profession('tornadizo'),
                'characteristic_id' => $characteristics->agility(),
                'min_value' => 15,
            ],
            [
                'profession_id' => $professions->profession('tornadizo'),
                'characteristic_id' => $characteristics->communication(),
                'min_value' => 15,
            ],
            [
                'profession_id' => $professions->profession('tornadizo'),
                'characteristic_id' => $characteristics->culture(),
                'min_value' => 10,
            ],
        ];
    }
}
