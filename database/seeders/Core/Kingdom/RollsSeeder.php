<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Kingdom;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Kingdom\KingdomLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class RollsSeeder extends Seeder
{
    public function run(): bool
    {
        $this->db->table(table: 'kingdom_rolls')->insert(values: $this->getData());
        return true;
    }

    protected function getData(): array
    {
        /** @var KingdomLoader $kingdoms */
        $kingdoms = tap(
            value: $this->getLoadedLoader(class: KingdomLoader::class),
            callback: static fn (KingdomLoader $loader) => $loader->load(),
        );

        return [
            [
                'kingdom_id' => $kingdoms->castilla(),
                'min_roll' => 1,
                'max_roll' => 4,
            ],
            [
                'kingdom_id' => $kingdoms->aragon(),
                'min_roll' => 5,
                'max_roll' => 6,
            ],
            [
                'kingdom_id' => $kingdoms->granada(),
                'min_roll' => 7,
                'max_roll' => 7,
            ],
            [
                'kingdom_id' => $kingdoms->navarra(),
                'min_roll' => 8,
                'max_roll' => 8,
            ],
            [
                'kingdom_id' => $kingdoms->portugal(),
                'min_roll' => 9,
                'max_roll' => 10,
            ],
        ];
    }
}
