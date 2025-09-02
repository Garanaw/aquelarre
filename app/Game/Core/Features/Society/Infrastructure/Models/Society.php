<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Society\Infrastructure\Models;

use App\Game\Core\Features\Society\Infrastructure\Collection\Societies;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property ?Stringable $description
 */
#[CollectedBy(Societies::class)]
class Society extends Model
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
