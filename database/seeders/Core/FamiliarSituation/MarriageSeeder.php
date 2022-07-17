<?php

declare(strict_types=1);

namespace Database\Seeders\Core\FamiliarSituation;

use Aquelarre\Core\FamiliarSituation\Domain\Enum\FamiliarSituation;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class MarriageSeeder extends Seeder
{
    protected ?string $table = 'marriages';

    public function run(): void
    {
        $this->db->table($this->table)->insert($this->getData());
    }

    public function getData(): array
    {
        return [
            [
                'name' => 'Cónyuge muerto',
                'status' => FamiliarSituation::DEAD->value,
                'dead' => true,
                'missing' => false,
                'description' => 'El PJ estuvo casado, pero el cónyuge murió, aunque pudo llegar a tener hijos.',
            ],
            [
                'name' => 'Cónyuge desaparecido',
                'status' => FamiliarSituation::MISSING->value,
                'dead' => false,
                'missing' => true,
                'description' => 'El PJ está casado, pero no sabe dónde se encuentra su cónyuge (desaparecido, raptado, fugado…), aunque puede que le haya dejado hijos a su cargo.',
            ],
            [
                'name' => 'Cónyuge vivo',
                'status' => FamiliarSituation::ALIVE->value,
                'dead' => false,
                'missing' => false,
                'description' => 'El PJ está casado y su cónyuge se encuentra en perfecto estado de salud: si acompaña al personaje, se creará de la forma descrita en la vergüenza Compañero de Infortunios. Además, el matrimonio puede haber dado frutos y tener hijos.',
            ],
        ];
    }
}
