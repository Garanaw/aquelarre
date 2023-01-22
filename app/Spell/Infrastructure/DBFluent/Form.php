<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\DBFluent;

use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $latin
 * @property string $description
 */
class Form extends Fluent
{
    public function description(string $description): self
    {
        $this->attributes['description'] = $description;

        return $this;
    }

    public static function talisman(): self
    {
        return new static([
            'name' => 'Talisman',
            'latin' => 'Amuletum',
        ]);
    }

    public static function hex(): self
    {
        return new static([
            'name' => 'Maleficio',
            'latin' => 'Maleficium',
        ]);
    }

    public static function summon(): self
    {
        return new static([
            'name' => 'Invocación',
            'latin' => 'Invocatio',
        ]);
    }

    public static function potion(): self
    {
        return new static([
            'name' => 'Poción',
            'latin' => 'Potionem',
        ]);
    }

    public static function ointment(): self
    {
        return new static([
            'name' => 'Ungüento',
            'latin' => 'Unctum',
        ]);
    }
}
