<?php

declare(strict_types=1);

namespace Database\Seeders\Spell;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book\BookLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\FormLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\NatureLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\OriginLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;
use Database\Seeders\Spell\Basic\SpellsSeeder as BasicSpellsSeeder;
use Database\Seeders\Spell\Demonolatreia\SpellsSeeder as DemonolatreiaSpellsSeeder;

class SpellsSeeder extends Seeder
{
    protected string $table = 'spells';

    private const SEEDERS = [
        BasicSpellsSeeder::class,
        DemonolatreiaSpellsSeeder::class,
    ];

    public function run(): bool
    {
        return $this->db->table($this->table)->insert($this->getData());
    }

    protected function getData(): array
    {
        $books = $this->getLoadedLoader(BookLoader::class);
        $forms = $this->getLoadedLoader(FormLoader::class);
        $natures = $this->getLoadedLoader(NatureLoader::class);
        $origins = $this->getLoadedLoader(OriginLoader::class);

        return collect(self::SEEDERS)
            ->map(fn (string $class): SpellsDataProvider => $this->app->make($class))
            ->map(fn (SpellsDataProvider $seeder) => $seeder->getData(
                books: $books,
                forms: $forms,
                natures: $natures,
                origins: $origins
            ))
            ->flatten(1)
            ->toArray();
    }
}
