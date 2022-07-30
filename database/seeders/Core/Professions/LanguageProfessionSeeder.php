<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Professions;

use Aquelarre\Core\Competences\Domain\Enum\Order;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\LanguagesLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Profession\ProfessionLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class LanguageProfessionSeeder extends Seeder
{
    protected string $table = 'language_profession';

    public function run(): bool
    {
        $this->db->table(table: $this->table)->insert(values: $this->getData());
        return true;
    }

    protected function getData(): array
    {
        /** @var ProfessionLoader $professions */
        $professions = $this->getLoadedLoader(ProfessionLoader::class);
        /** @var LanguagesLoader $languages */
        $languages = $this->getLoadedLoader(LanguagesLoader::class);

        return [
            [
                'profession_id' => $professions->profession(name: 'alfaqueque'),
                'language_id' => $languages->andalusi(),
                'order' => Order::PRIMARY->value,
            ],
            [
                'profession_id' => $professions->profession(name: 'alfaqueque'),
                'language_id' => $languages->castilian(),
                'order' => Order::PRIMARY->value,
            ],
            [
                'profession_id' => $professions->profession(name: 'cabalista'),
                'language_id' => $languages->greek(),
                'order' => Order::SECONDARY->value,
            ],
            [
                'profession_id' => $professions->profession(name: 'cabalista'),
                'language_id' => $languages->arabic(),
                'order' => Order::SECONDARY->value,
            ],
            [
                'profession_id' => $professions->profession(name: 'cabalista'),
                'language_id' => $languages->latin(),
                'order' => Order::SECONDARY->value,
            ],
        ];
    }
}
