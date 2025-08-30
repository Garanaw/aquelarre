<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Spells\Spell\Infrastructure\Models;

use App\Books\Infrastructure\Models\Relations\BelongsToBook;
use App\Game\Core\Features\Spells\Form\Infrastructure\Models\SpellForm;
use App\Game\Core\Features\Spells\Nature\Infrastructure\Models\SpellNature;
use App\Game\Core\Features\Spells\Origin\Infrastructure\Models\SpellOrigin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spell extends Model
{
    use BelongsToBook;

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
        'spell_form_id',
        'spell_nature_id',
        'spell_origin_id',
        'book_id',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(SpellForm::class, 'spell_form_id');
    }

    public function nature(): BelongsTo
    {
        return $this->belongsTo(SpellNature::class, 'spell_nature_id');
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(SpellOrigin::class, 'spell_origin_id');
    }
}
