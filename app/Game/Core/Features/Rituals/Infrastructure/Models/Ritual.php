<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Rituals\Infrastructure\Models;

use App\Books\Infrastructure\Models\Relations\BelongsToBook;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property Stringable $name
 * @property ?Stringable $latin
 * @property Stringable $ceremony
 * @property Stringable $duration
 * @property int $ordo
 * @property Stringable $effects
 * @property int $book_id
 */
class Ritual extends Model
{
    use BelongsToBook;

    protected $fillable = [
        'name',
        'latin',
        'ceremony',
        'duration',
        'ordo',
        'effects',
        'book_id',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'latin' => AsStringable::class,
            'ceremony' => AsStringable::class,
            'duration' => AsStringable::class,
            'effects' => AsStringable::class,
            'ordo' => 'integer',
        ];
    }
}
