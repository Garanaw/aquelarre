<?php

declare(strict_types=1);

namespace Aquelarre\Core\SocialPosition\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SocialPosition extends Model
{
    use HasFactory;

    public function expenses(): HasOne
    {
        return $this->hasOne(related: Expense::class);
    }
}
