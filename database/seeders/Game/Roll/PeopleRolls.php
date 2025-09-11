<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Roll;

use App\Game\Core\Features\Kingdom\Domain\Collection\KingdomCollection;
use App\Game\Core\Features\Kingdom\Infrastructure\Models\Kingdom;
use App\Game\Core\Features\People\Domain\Collection\PeopleCollection;
use App\Game\Core\Features\People\Infrastructure\Models\People;
use Garanaw\SeedableMigrations\Seeder;

class PeopleRolls extends Seeder
{
    public function run(): bool
    {
        return $this->db->table('people_rolls')->insert($this->getData());
    }

    protected function getData(): array
    {
        /** @var KingdomCollection $kingdoms */
        $kingdoms = Kingdom::all();
        /** @var PeopleCollection $people */
        $people = People::all();

        return [
            // Corona de Castilla
            [
                'people_id' => $people->castellano()->id,
                'kingdom_id' => $kingdoms->castilla()->id,
                'min_roll' => 1,
                'max_roll' => 3,
            ],
            [
                'people_id' => $people->gallego()->id,
                'kingdom_id' => $kingdoms->castilla()->id,
                'min_roll' => 4,
                'max_roll' => 5,
            ],
            [
                'people_id' => $people->vasco()->id,
                'kingdom_id' => $kingdoms->castilla()->id,
                'min_roll' => 6,
                'max_roll' => 6,
            ],
            [
                'people_id' => $people->asturleones()->id,
                'kingdom_id' => $kingdoms->castilla()->id,
                'min_roll' => 7,
                'max_roll' => 7,
            ],
            [
                'people_id' => $people->mudejar()->id,
                'kingdom_id' => $kingdoms->castilla()->id,
                'min_roll' => 8,
                'max_roll' => 9,
            ],
            [
                'people_id' => $people->judio()->id,
                'kingdom_id' => $kingdoms->castilla()->id,
                'min_roll' => 10,
                'max_roll' => 10,
            ],
            // Corona de Aragon
            [
                'people_id' => $people->aragones()->id,
                'kingdom_id' => $kingdoms->aragon()->id,
                'min_roll' => 1,
                'max_roll' => 4,
            ],
            [
                'people_id' => $people->catalan()->id,
                'kingdom_id' => $kingdoms->aragon()->id,
                'min_roll' => 5,
                'max_roll' => 8,
            ],
            [
                'people_id' => $people->mudejar()->id,
                'kingdom_id' => $kingdoms->aragon()->id,
                'min_roll' => 9,
                'max_roll' => 9,
            ],
            [
                'people_id' => $people->judio()->id,
                'kingdom_id' => $kingdoms->aragon()->id,
                'min_roll' => 10,
                'max_roll' => 10,
            ],
            // Reino de Granada
            [
                'people_id' => $people->arabe()->id,
                'kingdom_id' => $kingdoms->granada()->id,
                'min_roll' => 1,
                'max_roll' => 8,
            ],
            [
                'people_id' => $people->judio()->id,
                'kingdom_id' => $kingdoms->granada()->id,
                'min_roll' => 9,
                'max_roll' => 9,
            ],
            [
                'people_id' => $people->mozarabe()->id,
                'kingdom_id' => $kingdoms->granada()->id,
                'min_roll' => 10,
                'max_roll' => 10,
            ],
            // Reino de Navarra (navarro, vasco, judio)
            [
                'people_id' => $people->navarro()->id,
                'kingdom_id' => $kingdoms->navarra()->id,
                'min_roll' => 1,
                'max_roll' => 6,
            ],
            [
                'people_id' => $people->vasco()->id,
                'kingdom_id' => $kingdoms->navarra()->id,
                'min_roll' => 7,
                'max_roll' => 9,
            ],
            [
                'people_id' => $people->judio()->id,
                'kingdom_id' => $kingdoms->navarra()->id,
                'min_roll' => 10,
                'max_roll' => 10,
            ],
            // Reino de Portugal (portugues, judio, mudejar)
            [
                'people_id' => $people->portugues()->id,
                'kingdom_id' => $kingdoms->portugal()->id,
                'min_roll' => 1,
                'max_roll' => 6,
            ],
            [
                'people_id' => $people->judio()->id,
                'kingdom_id' => $kingdoms->portugal()->id,
                'min_roll' => 7,
                'max_roll' => 8,
            ],
            [
                'people_id' => $people->mudejar()->id,
                'kingdom_id' => $kingdoms->portugal()->id,
                'min_roll' => 9,
                'max_roll' => 10,
            ],
        ];
    }
}
