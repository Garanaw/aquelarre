<?php

declare(strict_types=1);

namespace App\Game\Core\Features\FamiliarSituation\Infrastructure\Models;

use App\Game\Core\Features\FamiliarSituation\Domain\Enum\FamiliarSituation as FamiliarSituationEnum;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property FamiliarSituationEnum $father
 * @property FamiliarSituationEnum $mother
 * @property bool $siblings
 * @property bool $bastard
 * @property bool $tutor
 * @property Stringable $description
 */
class FamiliarSituation extends Model
{
    protected $fillable = [
        'name',
        'father',
        'mother',
        'siblings',
        'bastard',
        'tutor',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'father' => FamiliarSituationEnum::class,
            'mother' => FamiliarSituationEnum::class,
            'siblings' => 'boolean',
            'bastard' => 'boolean',
            'tutor' => 'boolean',
            'description' => AsStringable::class,
        ];
    }
}
