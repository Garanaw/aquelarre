<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Form\Infrastructure\Models;

use App\Game\Core\Features\Spells\Form\Infrastructure\Collection\FormCollection;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $latin
 * @property Stringable $description
 */
#[CollectedBy(FormCollection::class)]
class SpellForm extends Model
{
    protected $fillable = [
        'name',
        'latin',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'latin' => AsStringable::class,
            'description' => AsStringable::class,
        ];
    }
}
