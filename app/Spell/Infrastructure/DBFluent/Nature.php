<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\DBFluent;

use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $description
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

    public function description(string $description): static
    {
        $this->attributes['description'] = $description;

        return $this;
    }
}
