<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Infrastructure\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $prefix
 * @property ?Stringable $latin
 * @property bool $primary
 * @property Stringable $description
 */
class Characteristic extends Model
{
    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'prefix' => AsStringable::class,
            'latin' => AsStringable::class,
            'primary' => 'boolean',
            'description' => AsStringable::class,
        ];
    }
}
