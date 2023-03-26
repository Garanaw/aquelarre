<?php

declare(strict_types=1);

namespace Database\Seeders\Commerce;

use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Database\Seeders\Commerce\Items\ArmorSeeder;
use Database\Seeders\Commerce\Items\ClothingSeeder;
use Database\Seeders\Commerce\Items\CommoditySeeder;
use Database\Seeders\Commerce\Items\FoodSeeder;
use Database\Seeders\Commerce\Items\JewelrySeeder;
use Database\Seeders\Commerce\Items\PoisonSeeder;
use Database\Seeders\Commerce\Items\PossessionSeeder;
use Database\Seeders\Commerce\Items\ServiceSeeder;
use Database\Seeders\Commerce\Items\ShieldSeeder;
use Database\Seeders\Commerce\Items\TransportSeeder;
use Database\Seeders\Commerce\Items\WeaponSeeder;
use Database\Seeders\Contracts\DataProvider;

class ItemsSeeder extends Seeder
{
    protected string $table = 'items';

    /** @var class-string[] */
    private array $dataProviders = [
        ClothingSeeder::class,
        FoodSeeder::class,
        TransportSeeder::class,
        PossessionSeeder::class,
        ServiceSeeder::class,
        CommoditySeeder::class,
        JewelrySeeder::class,
        PoisonSeeder::class,
        WeaponSeeder::class,
        ArmorSeeder::class,
        ShieldSeeder::class,
    ];

    public function run(): bool
    {
        collect($this->getData())
            ->each(fn (array $data) => $this->db->table($this->table)->insert($data));

        return true;
    }

    protected function getData(): array
    {
        return collect($this->dataProviders)
            ->map(fn (string $provider) => $this->app->make($provider))
            ->map(fn (DataProvider $seeder) => $seeder->getData())
            ->toArray();
    }
}
