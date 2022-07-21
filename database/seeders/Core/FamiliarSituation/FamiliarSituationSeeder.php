<?php

declare(strict_types=1);

namespace Database\Seeders\Core\FamiliarSituation;

use Aquelarre\Core\FamiliarSituation\Domain\Enum\FamiliarSituation;
use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class FamiliarSituationSeeder extends Seeder
{
    protected ?string $table = 'familiar_situations';

    public function run(): bool
    {
        $this->db->table($this->table)->insert($this->getData());
        return true;
    }

    public function getData(): array
    {
        return [
            [
                'name' => 'Bastardo, padres desconocidos',
                'father' => FamiliarSituation::UNKNOWN->value,
                'mother' => FamiliarSituation::UNKNOWN->value,
                'siblings' => false,
                'bastard' => true,
                'tutor' => true,
                'description' => 'El personaje es hijo bastardo y además desconoce quiénes fueron sus padres: no posee hermanos y se ha criado con un protector o un tutor que le ha enseñado lo que sabe de la vida.',
            ],
            [
                'name' => 'Fornecido',
                'father' => FamiliarSituation::ALIVE->value,
                'mother' => FamiliarSituation::ALIVE->value,
                'siblings' => false,
                'bastard' => true,
                'tutor' => true,
                'description' => 'Fornecido: Hijo de un adulterio, de una relación incestuosa entre parientes o de una monja o sacerdote.',
            ],
            [
                'name' => 'Espurio',
                'father' => FamiliarSituation::UNKNOWN->value,
                'mother' => FamiliarSituation::ALIVE->value,
                'siblings' => true,
                'bastard' => true,
                'tutor' => false,
                'description' => 'Espurio: Hijo de una barragana concubina pero que no ha sido reconocido por el padre.',
            ],
            [
                'name' => 'Manssur',
                'father' => FamiliarSituation::UNKNOWN->value,
                'mother' => FamiliarSituation::ALIVE->value,
                'siblings' => false,
                'bastard' => true,
                'tutor' => false,
                'description' => 'Manssur: Hijo de prostituta.',
            ],
            [
                'name' => 'Natural',
                'father' => FamiliarSituation::ALIVE->value,
                'mother' => FamiliarSituation::ALIVE->value,
                'siblings' => true,
                'bastard' => true,
                'tutor' => false,
                'description' => 'Natural: Hijo de una barragana o concubina pero que sí ha sido reconocido por el padre.',
            ],
            [
                'name' => 'Nato',
                'father' => FamiliarSituation::ALIVE->value,
                'mother' => FamiliarSituation::ALIVE->value,
                'siblings' => true,
                'bastard' => true,
                'tutor' => false,
                'description' => 'Nato: Hijo de un adulterio, pero que ha sido criado por el marido cornudo como si fuera hijo suyo.',
            ],
            [
                'name' => 'Padres vivos',
                'father' => FamiliarSituation::ALIVE->value,
                'mother' => FamiliarSituation::ALIVE->value,
                'siblings' => true,
                'bastard' => false,
                'tutor' => false,
                'description' => 'El personaje ha nacido en el seno de un matrimonio y sus padres todavía están vivos.',
            ],
            [
                'name' => 'Padre muerto',
                'father' => FamiliarSituation::DEAD->value,
                'mother' => FamiliarSituation::ALIVE->value,
                'siblings' => true,
                'bastard' => false,
                'tutor' => false,
                'description' => 'El personaje ha nacido en el seno de un matrimonio, aunque sólo viven su madre y sus hermanos. En caso de ser hijo primogénito, el PJ hereda el título de su padre.',
            ],
            [
                'name' => 'Madre muerta',
                'father' => FamiliarSituation::ALIVE->value,
                'mother' => FamiliarSituation::DEAD->value,
                'siblings' => true,
                'bastard' => false,
                'tutor' => false,
                'description' => 'El personaje ha nacido en el seno de un matrimonio, aunque sólo viven su padre y sus hermanos.',
            ],
            [
                'name' => 'Padres muertos',
                'father' => FamiliarSituation::DEAD->value,
                'mother' => FamiliarSituation::DEAD->value,
                'siblings' => true,
                'bastard' => false,
                'tutor' => false,
                'description' => 'El personaje ha nacido en el seno de un matrimonio, pero no vive ninguno de sus padres, sólo sus hermanos. En caso de ser hijo primogénito, el PJ hereda el título de su padre.',
            ],
        ];
    }
}
