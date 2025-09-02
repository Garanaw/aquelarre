<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Marriage;

use App\Game\Core\Features\FamiliarSituation\Domain\Enum\FamiliarSituation;
use Garanaw\SeedableMigrations\Seeder;

class MarriagesSeeder extends Seeder
{
    public function run(): bool
    {
        return $this->db->table('marriages')->insert($this->getData());
    }

    protected function getData(): array
    {
        return [
            [
                'name' => 'Cónyuge muerto',
                'status' => FamiliarSituation::DEAD->value,
                'description' => 'El PJ estuvo casado, pero el cónyuge murió, aunque pudo llegar a tener hijos.',
            ],
            [
                'name' => 'Cónyuge desaparecido',
                'status' => FamiliarSituation::MISSING->value,
                'description' => 'El PJ está casado, pero no sabe dónde se encuentra su cónyuge (desaparecido, raptado, fugado…), aunque puede que le haya dejado hijos a su cargo.',
            ],
            [
                'name' => 'Cónyuge vivo',
                'status' => FamiliarSituation::ALIVE->value,
                'description' => 'El PJ está casado y su cónyuge se encuentra en perfecto estado de salud: si acompaña al personaje, se creará de la forma descrita en la vergüenza Compañero de Infortunios. Además, el matrimonio puede haber dado frutos y tener hijos.',
            ],
        ];
    }
}
