<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions;

use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Database\Seeders\Contracts\DataProvider;
use Database\Seeders\Core\Professions\DataProviders\Characteristic\BasicProfessions;
use Database\Seeders\Core\Professions\DataProviders\Characteristic\DaemonolatreiaProfessions;
use Database\Seeders\Core\Professions\DataProviders\Characteristic\DecameronProfessions;

class CharacteristicProfessionSeeder extends Seeder
{
    protected string $table = 'characteristic_profession';

    protected array $dataProviders = [
        BasicProfessions::class,
        DaemonolatreiaProfessions::class,
        DecameronProfessions::class,
    ];

    public function run(): bool
    {
        return $this->db->table(table: $this->table)->insert(values: $this->getData());
    }

    protected function getData(): array
    {
        return collect($this->dataProviders)
            ->map(fn (string $class) => $this->app->make($class))
            ->map(static fn (DataProvider $provider) => $provider->getData())
            ->flatten(depth: 1)
            ->toArray();
    }
}
