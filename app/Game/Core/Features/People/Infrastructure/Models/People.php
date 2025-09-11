<?php

declare(strict_types=1);

namespace App\Game\Core\Features\People\Infrastructure\Models;

use App\Game\Core\Features\People\Domain\Collection\PeopleCollection;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $description
 * @property int $book_id
 */
#[CollectedBy(PeopleCollection::class)]
class People extends Model
{
    protected $table = 'peoples';

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
}
