<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Professions\Infrastructure\Models;

use App\Books\Infrastructure\Models\Relations\BelongsToBook;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property Stringable $name
 * @property bool $man
 * @property bool $woman
 * @property bool $has_faith
 * @property bool $only_secondary
 * @property int $book_id
 * @property Stringable $description
 */
class Profession extends Model
{
    use BelongsToBook;

    protected $fillable = [
        'name',
        'man',
        'woman',
        'has_faith',
        'only_secondary',
        'book_id',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'description' => AsStringable::class,
            'man' => 'boolean',
            'woman' => 'boolean',
            'has_faith' => 'boolean',
            'only_secondary' => 'boolean',
            'book_id' => 'integer',
        ];
    }
}
