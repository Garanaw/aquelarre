<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions\DataProviders\Characteristic;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Characteristic\CharacteristicsLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Database\Seeders\Contracts\DataProvider;

class BasicProfessions extends DataProvider
{
    public function getData(): array
    {
        $characteristics = $this->getLoadedLoader(CharacteristicsLoader::class);
        $professions = $this->getLoadedLoader(ProfessionLoader::class);

        return [
        [
            'profession_id' => $professions->profession('alguacil'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('alguacil'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('almogavar'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('almogavar'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('alquimista'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('ama'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('artesano'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('artesano'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('bandido'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('bandido'),
            'characteristic_id' => $characteristics->resistence(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('Barbero Cirujano'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('Barbero Cirujano'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('Barbero Cirujano'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('brujo'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('bufon'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('bufon'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('caballero_de_orden_militar_hombre'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('caballero_de_orden_militar_hombre'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('caballero_de_orden_militar_mujer'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('caballero_de_orden_militar_mujer'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('cambista'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('cambista'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('cambista'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('cazador'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('clerigo'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('clerigo'),
            'characteristic_id' => $characteristics->luck(),
            'min_value' => 50,
        ],
        [
            'profession_id' => $professions->profession('comerciante'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('comico'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('cortesano'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('cortesano'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('curandero'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('curandero'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('derviche'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('derviche'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('embaucador'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('embaucador'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('escriba'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('escriba'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('ghazi'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('ghazi'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('ghazi'),
            'characteristic_id' => $characteristics->luck(),
            'min_value' => 40,
        ],
        [
            'profession_id' => $professions->profession('goliardo'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('goliardo'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('goliardo'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('infanzon'),
            'characteristic_id' => $characteristics->strength(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('infanzon'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('juglar'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('juglar'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('juglar'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('ladron'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('ladron'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('mago'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('mago'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('malsin'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('malsin'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('marino'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('marino'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('medico'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('medico'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('mediero'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('mediero'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('monje'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('monje'),
            'characteristic_id' => $characteristics->luck(),
            'min_value' => 45,
        ],
        [
            'profession_id' => $professions->profession('muccadim'),
            'characteristic_id' => $characteristics->strength(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('muccadim'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 10,
        ],
        [
            'profession_id' => $professions->profession('pardo'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('pardo'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('pastor'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('pastor'),
            'characteristic_id' => $characteristics->perception(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('pirata'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('pirata'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('qaina'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('qaina'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('qaina'),
            'characteristic_id' => $characteristics->aspect(),
            'min_value' => 17,
        ],
        [
            'profession_id' => $professions->profession('rabino'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('rabino'),
            'characteristic_id' => $characteristics->luck(),
            'min_value' => 50,
        ],
        [
            'profession_id' => $professions->profession('ramera'),
            'characteristic_id' => $characteristics->aspect(),
            'min_value' => 17,
        ],
        [
            'profession_id' => $professions->profession('sacerdote'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('sacerdote'),
            'characteristic_id' => $characteristics->luck(),
            'min_value' => 50,
        ],
        [
            'profession_id' => $professions->profession('siervo_de_corte'),
            'characteristic_id' => $characteristics->agility(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('siervo_de_corte'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('soldado'),
            'characteristic_id' => $characteristics->strength(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('soldado'),
            'characteristic_id' => $characteristics->ability(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('trovador'),
            'characteristic_id' => $characteristics->communication(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('trovador'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 15,
        ],
        [
            'profession_id' => $professions->profession('ulema'),
            'characteristic_id' => $characteristics->culture(),
            'min_value' => 20,
        ],
        [
            'profession_id' => $professions->profession('ulema'),
            'characteristic_id' => $characteristics->luck(),
            'min_value' => 50,
        ],
    ];
    }
}
