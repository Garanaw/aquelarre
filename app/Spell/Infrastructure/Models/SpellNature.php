<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\Models;

use Aquelarre\Core\Shared\Domain\Support\Stringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $description
 * @property \Illuminate\Database\Eloquent\Collection $spells
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class SpellNature extends Model
{
    /** @var string[] */
    // phpcs:disable
    protected $casts = [
        'name' => Stringable::class,
        'description' => Stringable::class,
    ];

    public function spells(): HasMany
    {
        return $this->hasMany(Spell::class);
    }
}
