<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Book extends Model
{
    /** @var array<string, mixed> */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint -- baseline
    protected $casts = [
        'id' => 'int',
    ];

    public function getId(): int
    {
        return $this->id;
    }
}
