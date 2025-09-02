<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Theology\Infrastructure\Models;

use App\Books\Infrastructure\Models\Book;
use App\Game\Core\Features\Theology\Infrastructure\Collection\Theologies;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property ?Stringable $description
 * @property int $book_id
 */
#[CollectedBy(Theologies::class)]
class Theology extends Model
{
    protected $fillable = [
        'name',
        'description',
        'book_id',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'description' => AsStringable::class,
        ];
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
