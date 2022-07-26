<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions;

use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Database\Seeders\Contracts\DataProvider;
use Database\Seeders\Core\Professions\DataProviders\Weapons\Basic;
use Database\Seeders\Core\Professions\DataProviders\Weapons\Decameron;

class WeaponProfessionSeeder extends Seeder
{
    protected string $table = 'profession_weapon';

    protected array $dataProviders = [
        Basic::class,
        Decameron::class,
    ];

    public function run(): bool
    {
        $this->db->table(table: $this->table)->insert(values: $this->getData());
        return true;
    }

    protected function getData(): array
    {
        return collect($this->dataProviders)
            ->map(function (string $class): array {
                /** @var DataProvider $provider */
                $provider = $this->app->make($class);
                return $provider->getData();
            })
            ->flatten(depth: 1)
            ->toArray();
    }
}
