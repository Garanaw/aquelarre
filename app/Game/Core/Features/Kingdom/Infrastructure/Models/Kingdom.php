<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Infrastructure\Models;

use App\Books\Infrastructure\Models\Relations\BelongsToBook;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property Stringable $name
 * @property bool $peninsular
 * @property ?Stringable $description
 * @property int $book_id
 */
class Kingdom extends Model
{
    use BelongsToBook;

    protected $fillable = [
        'name',
        'peninsular',
        'description',
        'book_id',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'peninsular' => 'boolean',
            'description' => AsStringable::class,
            'book_id' => 'integer',
        ];
    }
}
