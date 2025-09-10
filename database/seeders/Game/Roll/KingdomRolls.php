<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Roll;

use App\Game\Core\Features\Kingdom\Domain\Collection\KingdomCollection;
use App\Game\Core\Features\Kingdom\Infrastructure\Models\Kingdom;
use Garanaw\SeedableMigrations\Seeder;

class KingdomRolls extends Seeder
{
    public function run(): bool
    {
        return $this->db->table('kingdom_rolls')->insert($this->getData());
    }

    protected function getData(): array
    {
        /** @var KingdomCollection<Kingdom> $kingdoms */
        $kingdoms = Kingdom::all();

        return [
            [
                'kingdom_id' => $kingdoms->castilla()->id,
                'min_roll' => 1,
                'max_roll' => 4,
            ],
            [
                'kingdom_id' => $kingdoms->aragon()->id,
                'min_roll' => 5,
                'max_roll' => 6,
            ],
            [
                'kingdom_id' => $kingdoms->granada()->id,
                'min_roll' => 7,
                'max_roll' => 7,
            ],
            [
                'kingdom_id' => $kingdoms->navarra()->id,
                'min_roll' => 8,
                'max_roll' => 8,
            ],
            [
                'kingdom_id' => $kingdoms->portugal()->id,
                'min_roll' => 9,
                'max_roll' => 10,
            ],
        ];
    }
}
