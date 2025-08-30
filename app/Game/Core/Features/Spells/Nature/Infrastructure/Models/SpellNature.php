<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Nature\Infrastructure\Models;

use App\Game\Core\Features\Spells\Nature\Infrastructure\Collection\NatureCollection;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $description
 */
#[CollectedBy(NatureCollection::class)]
class SpellNature extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'description' => AsStringable::class,
        ];
    }
}
