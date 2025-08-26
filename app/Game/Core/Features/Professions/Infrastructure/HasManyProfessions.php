<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Professions\Infrastructure;

use App\Game\Core\Features\Professions\Infrastructure\Models\Profession;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyProfessions
{
    public function professions(): HasMany
    {
        return $this->hasMany(Profession::class);
    }
}
