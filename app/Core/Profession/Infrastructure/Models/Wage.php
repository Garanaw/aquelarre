<?php

declare(strict_types=1);

namespace Aquelarre\Core\Profession\Infrastructure\Models;

use Aquelarre\Core\Framework\Domain\Enum\Multiplier;
use Aquelarre\Core\Framework\Domain\Enum\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wage extends Model
{
    /** @inheritdoc  */
    protected $casts = [
        'operation' => Operation::class,
        'multiplier' => Multiplier::class,
    ];

    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }
}
