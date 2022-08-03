<?php

declare(strict_types=1);

namespace Aquelarre\Core\Profession\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profession extends Model
{
    use HasFactory;

    public function wage(): HasMany
    {
        return $this->hasMany(Wage::class);
    }
}
