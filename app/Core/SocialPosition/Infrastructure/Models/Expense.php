<?php

declare(strict_types=1);

namespace Aquelarre\Core\SocialPosition\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    public function socialPosition(): BelongsTo
    {
        return $this->belongsTo(related: SocialPosition::class);
    }
}
