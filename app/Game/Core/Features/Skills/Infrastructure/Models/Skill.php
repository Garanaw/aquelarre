<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Skills\Infrastructure\Models;

use App\Books\Infrastructure\Models\Relations\BelongsToBook;
use App\Game\Core\Features\Characteristics\Infrastructure\Models\Characteristic;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $latin
 * @property Stringable $description
 * @property int $characteristic_id
 * @property bool $is_weapon
 * @property bool $is_language
 * @property bool $initial
 * @property bool $starts_with_base
 * @property ?int $book_id
 * @property ?int $created_by
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 */
class Skill extends Model
{
    use BelongsToBook;

    protected $fillable = [
        'name',
        'latin',
        'description',
        'characteristic_id',
        'is_weapon',
        'is_language',
        'initial',
        'starts_with_base',
        'book_id',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'latin' => AsStringable::class,
            'description' => AsStringable::class,
            'characteristic_id' => 'integer',
            'is_weapon' => 'boolean',
            'is_language' => 'boolean',
            'initial' => 'boolean',
            'starts_with_base' => 'boolean',
            'book_id' => 'integer',
            'created_by' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function characteristic(): BelongsTo
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id');
    }
}
