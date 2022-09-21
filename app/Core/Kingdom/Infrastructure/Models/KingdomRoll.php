<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KingdomRoll extends Model
{
    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(related: Kingdom::class);
    }
}
