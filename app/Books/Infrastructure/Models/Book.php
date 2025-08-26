<?php

declare(strict_types=1);

namespace App\Books\Infrastructure\Models;

use App\Books\Domain\Collection\BookCollection;
use App\Books\Infrastructure\Enum\BookType;
use App\Books\Infrastructure\Enum\Edition;
use App\Game\Core\Features\Professions\Infrastructure\HasManyProfessions;
use App\User\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Stringable;

/**
 * @property-read int $id
 * @property Stringable $name
 * @property BookType $type
 * @property Edition $edition
 * @property ?Stringable $editorial
 * @property ?Stringable $isbn10
 * @property ?Stringable $isbn13
 * @property ?Stringable $editorial_code
 * @property ?Carbon $published_at
 * @property ?Stringable $url
 * @property ?Stringable $comment
 */
#[CollectedBy(BookCollection::class)]
class Book extends Model
{
    use HasManyProfessions;

    protected $fillable = [
        'name',
        'type',
        'edition',
        'editorial',
        'isbn10',
        'isbn13',
        'editorial_code',
        'published_at',
        'url',
        'comment',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'type' => BookType::class,
            'edition' => Edition::class,
            'editorial' => AsStringable::class,
            'isbn10' => AsStringable::class,
            'isbn13' => AsStringable::class,
            'editorial_code' => AsStringable::class,
            'published_at' => 'date',
            'url' => AsStringable::class,
            'comment' => AsStringable::class,
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
