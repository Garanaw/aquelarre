<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\Models;

use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Aquelarre\Core\Shared\Domain\Support\Stringable;
use Aquelarre\Spell\Domain\Enum\Vis;
use Aquelarre\Spell\Infrastructure\Database\Builder\SpellBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property Stringable $name
 * @property Stringable $latin
 * @property Vis $vis
 * @property int $form_id
 * @property SpellForm $form
 * @property int $origin_id
 * @property SpellOrigin $origin
 * @property int $nature_id
 * @property SpellNature $nature
 * @property int $book_id
 * @property Book $book
 * @property bool $use_faith
 * @property string $expiration
 * @property string $duration
 * @property string $components
 * @property string $preparation
 * @property string $description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static SpellBuilder|Spell newQuery()
 */
class Spell extends Model
{
    /** @var string[] */
    protected $casts = [
        'name' => Stringable::class,
        'latin' => Stringable::class,
        'vis' => Vis::class,
        'use_faith' => 'bool',
        'expiration' => Stringable::class,
        'duration' => Stringable::class,
        'components' => Stringable::class,
        'preparation' => Stringable::class,
    ];

    /** @param \Illuminate\Database\Query\Builder $query */
    public function newEloquentBuilder($query): SpellBuilder
    {
        return new SpellBuilder($query);
    }

    public function form(): BelongsTo
    {
        return $this->belongsTo(SpellForm::class, 'spell_form_id');
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(SpellOrigin::class, 'spell_origin_id');
    }

    public function nature(): BelongsTo
    {
        return $this->belongsTo(SpellNature::class, 'spell_nature_id');
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
