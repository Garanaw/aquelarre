<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\Models;

use Aquelarre\Core\Shared\Domain\Support\Stringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class SpellNature extends Model
{
    protected $casts = [
        'name' => Stringable::class,
        'description' => Stringable::class,
    ];

    public function spells(): HasMany
    {
        return $this->hasMany(Spell::class);
    }
}