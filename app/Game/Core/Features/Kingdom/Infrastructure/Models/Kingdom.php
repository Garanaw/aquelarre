<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Infrastructure\Models;

use App\Books\Infrastructure\Models\Relations\BelongsToBook;
use App\Game\Core\Features\Kingdom\Domain\Collection\KingdomCollection;
use App\Game\Core\Features\Kingdom\Infrastructure\Builder\KingdomBuilder;
use App\Shared\Optimus\OptimusConnection;
use App\Shared\Optimus\UsesOptimus;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Attributes\UseEloquentBuilder;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property bool $peninsular
 * @property ?Stringable $description
 * @property int $book_id
 */
#[CollectedBy(KingdomCollection::class)]
#[UseEloquentBuilder(KingdomBuilder::class)]
class Kingdom extends Model
{
    use BelongsToBook;
    use UsesOptimus;

    protected $fillable = [
        'name',
        'peninsular',
        'description',
        'book_id',
    ];

    #[\Override]
    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'peninsular' => 'boolean',
            'description' => AsStringable::class,
            'book_id' => 'integer',
        ];
    }

    protected function getOptimusConnection(): string
    {
        return OptimusConnection::KINGDOM->value;
    }

    public function roll(): HasOne
    {
        return $this->hasOne(KingdomRoll::class);
    }
}
