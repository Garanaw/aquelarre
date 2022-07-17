<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions;

use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Database\Seeders\Contracts\DataProvider;
use Database\Seeders\Core\Professions\DataProviders\BasicProfessionsDataProvider;
use Database\Seeders\Core\Professions\DataProviders\DaemonolatreiaProfessionDataProvider;

class ProfessionSeeder extends Seeder
{
    protected ?string $table = 'professions';

    protected array $dataProviders = [
        BasicProfessionsDataProvider::class,
        DaemonolatreiaProfessionDataProvider::class,
    ];

    public function run(): void
    {
        $this->db->table(table: $this->table)->insert($this->getData());
    }

    public function getData(): array
    {
        return collect($this->dataProviders)
            ->map(fn (string $class) => $this->app->make($class))
            ->map(static fn (DataProvider $provider) => $provider->getData())
            ->flatten(depth: 1)
            ->toArray();
    }
}
