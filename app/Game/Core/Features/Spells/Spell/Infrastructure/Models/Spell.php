<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Infrastructure\Models;

use App\Game\Core\Features\Spells\Form\Infrastructure\Models\SpellForm;
use App\Game\Core\Features\Spells\Nature\Infrastructure\Models\SpellNature;
use App\Game\Core\Features\Spells\Origin\Infrastructure\Models\SpellOrigin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spell extends Model
{
    protected $fillable = [
        'name',
        'description',
        'level',
        'range',
        'duration',
        'casting_time',
        'components',
        'material_components',
        'ritual',
        'concentration',
        'school_id',
        'form_id',
        'nature_id',
        'origin_id',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(SpellForm::class);
    }

    public function nature(): BelongsTo
    {
        return $this->belongsTo(SpellNature::class);
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(SpellOrigin::class);
    }
}
