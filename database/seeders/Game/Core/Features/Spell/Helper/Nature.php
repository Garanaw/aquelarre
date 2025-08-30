<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Spell\Helper;

use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $description
 * @method static self description(string $description)
 */
class Nature extends Fluent
{
    public static function white(): static
    {
        return new static([
            'name' => 'Magia Blanca',
        ]);
    }

    public static function black(): static
    {
        return new static([
            'name' => 'Magia Negra',
        ]);
    }
}
