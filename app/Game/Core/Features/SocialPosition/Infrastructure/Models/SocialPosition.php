<?php

declare(strict_types=1);

namespace App\Game\Core\Features\SocialPosition\Infrastructure\Models;

use App\Game\Core\Features\SocialPosition\Infrastructure\Collection\SocialPositions;
use App\Game\Core\Features\Society\Infrastructure\Models\Society;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Stringable;

/**
 * @property int $id
 * @property Stringable $name
 * @property ?Stringable $description
 * @property int $society_id
 * @property Society $society
 */
#[CollectedBy(SocialPositions::class)]
class SocialPosition extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'name' => AsStringable::class,
            'description' => AsStringable::class,
        ];
    }

    public function society(): BelongsTo
    {
        return $this->belongsTo(related: Society::class, foreignKey: 'society_id');
    }
}
