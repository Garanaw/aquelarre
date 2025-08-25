<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Infrastructure\Models;

use App\Game\Core\Features\Characteristics\Domain\Collection\CharacteristicCollection;
use App\Game\Core\Features\Characteristics\Domain\Enum\Prefix;
use App\Game\Core\Features\Skills\Infrastructure\Models\Skill;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property Prefix $prefix
 * @property ?Stringable $latin
 * @property bool $primary
 * @property Stringable $description
 */
#[CollectedBy(CharacteristicCollection::class)]
class Characteristic extends Model
{
    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'prefix' => Prefix::class,
            'latin' => AsStringable::class,
            'primary' => 'boolean',
            'description' => AsStringable::class,
        ];
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'characteristic_id');
    }
}
