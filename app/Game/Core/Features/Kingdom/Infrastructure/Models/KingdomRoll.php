<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Kingdom\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $kingdom_id
 * @property int $min
 * @property int $max
 */
class KingdomRoll extends Model
{
    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class);
    }
}
