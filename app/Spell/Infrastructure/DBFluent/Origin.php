<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\DBFluent;

use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $description
 */
class Origin extends Fluent
{
    public function description(string $description): static
    {
        $this->attributes['description'] = $description;

        return $this;
    }

    public static function popular(): static
    {
        return new static([
            'name' => 'Magia Popular',
        ]);
    }

    public static function alchemical(): static
    {
        return new static([
            'name' => 'Magia Alquímica',
        ]);
    }

    public static function pagan(): static
    {
        return new static([
            'name' => 'Magia Pagana',
        ]);
    }

    public static function infernal(): static
    {
        return new static([
            'name' => 'Magia Infernal',
        ]);
    }

    public static function forbidden(): static
    {
        return new static([
            'name' => 'Magia Prohibida',
        ]);
    }
}
