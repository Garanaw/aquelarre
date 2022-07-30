<?php

declare(strict_types=1);

namespace Database\Seeders\Core\Weapons;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Competence\CompetencesLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class WeaponTypesSeeder extends Seeder
{
    protected ?string $table = 'weapon_types';

    public function run(): bool
    {
        $this->db->table(table: $this->table)->insert(values: $this->getData());
        return true;
    }

    protected function getData(): array
    {
        /** @var CompetencesLoader $weapons */
        $weapons = $this->getLoadedLoader(class: CompetencesLoader::class);

        return [
            [
                'competence_id' => $weapons->get('arco'),
                'villain' => true,
                'soldier' => true,
                'noble' => false,
            ],
            [
                'competence_id' => $weapons->get('ballesta'),
                'villain' => false,
                'soldier' => true,
                'noble' => true,
            ],
            [
                'competence_id' => $weapons->get('cuchillo'),
                'villain' => true,
                'soldier' => true,
                'noble' => true,
            ],
            [
                'competence_id' => $weapons->get('espadas'),
                'villain' => false,
                'soldier' => false,
                'noble' => true,
            ],
            [
                'competence_id' => $weapons->get('espadones'),
                'villain' => false,
                'soldier' => false,
                'noble' => true,
            ],
            [
                'competence_id' => $weapons->get('hachas'),
                'villain' => true,
                'soldier' => true,
                'noble' => false,
            ],
            [
                'competence_id' => $weapons->get('hondas'),
                'villain' => true,
                'soldier' => false,
                'noble' => false,
            ],
            [
                'competence_id' => $weapons->get('lanzas'),
                'villain' => false,
                'soldier' => true,
                'noble' => true,
            ],
            [
                'competence_id' => $weapons->get('mazas'),
                'villain' => true,
                'soldier' => true,
                'noble' => false,
            ],
            [
                'competence_id' => $weapons->get('palos'),
                'villain' => true,
                'soldier' => false,
                'noble' => false,
            ],
            [
                'competence_id' => $weapons->get('pelea'),
                'villain' => true,
                'soldier' => true,
                'noble' => true,
            ],
            [
                'competence_id' => $weapons->get('escudo'),
                'villain' => false,
                'soldier' => true,
                'noble' => true,
            ]
        ];
    }
}
