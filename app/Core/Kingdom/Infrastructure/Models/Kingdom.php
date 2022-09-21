<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Infrastructure\Models;

use Aquelarre\Core\Framework\Infrastructure\Eloquent\Casts\AsStringable;
use Aquelarre\Core\Kingdom\Infrastructure\Builder\KingdomBuilder;
use Aquelarre\Core\Shared\Domain\Support\Stringable; // phpcs:ignore SlevomatCodingStandard.Namespaces.UnusedUses
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $description
 * @property bool $peninsular
 * @property int $book_id
 */
class Kingdom extends Model
{
    use HasFactory;

    /** @var array<string, mixed> */
    // phpcs:disable SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
    protected $casts = [
        'id' => 'int',
        'name' => AsStringable::class,
        'peninsular' => 'boolean',
        'description' => AsStringable::class,
    ];

    // phpcs:ignore SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
    public function newEloquentBuilder($query): KingdomBuilder
    {
        return new KingdomBuilder($query);
    }

    public function roll(): HasOne
    {
        return $this->hasOne(KingdomRoll::class);
    }
}
