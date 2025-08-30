<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Spell\Helper;

use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $latin
 * @property string $description
 * @method self description(string $description)
 */
class Form extends Fluent
{
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
