<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\Models;

use Aquelarre\Core\Shared\Domain\Support\Stringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $latin
 * @property Stringable $description
 * @property string $created_at
 * @property string $updated_at
 */
class SpellForm extends Model
{
    /** @var string[] */
    protected $casts = [
        'name' => Stringable::class,
        'latin' => Stringable::class,
        'description' => Stringable::class,
    ];

    public function spells(): HasMany
    {
        return $this->hasMany(Spell::class);
    }
}
