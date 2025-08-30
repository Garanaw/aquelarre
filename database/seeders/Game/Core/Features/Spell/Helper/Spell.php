<?php

declare(strict_types=1);

namespace Database\Seeders\Game\Core\Features\Spell\Helper;

use App\Books\Domain\Collection\BookCollection;
use App\Game\Core\Features\Spells\Spell\Domain\Enum\Vis;
use Illuminate\Support\Fluent;

/**
 * @property string $name
 * @property string $latin
 * @property int $vis
 * @property int $form
 * @property int $nature
 * @property int $origin
 * @property int $book
 * @property string $use_faith
 * @property string $expiration
 * @property int $duration
 * @property string $components
 * @property string $preparation
 * @property string $description
 * @method self latin(?string $latin)
 * @method self vis(int $vis)
 * @method self expiration(?string $expiration)
 * @method self duration(?int $duration)
 * @method self components(?string $components)
 * @method self preparation(?string $preparation)
 * @method self description(string $description)
 * @method self book(int $bookId)
 * @method self form(int $formId)
 * @method self nature(int $natureId)
 * @method self origin(int $originId)
 */
class Spell extends Fluent
{
    public static function of(string $name): static
    {
        return new static([
            'name' => $name,
            'latin' => null,
            'use_faith' => false,
        ]);
    }

    // Vis levels
    public function visPrima(): static
    {
        return $this->vis(Vis::PRIMA->value);
    }

    public function visSecunda(): static
    {
        return $this->vis(Vis::SECUNDA->value);
    }

    public function visTertia(): static
    {
        return $this->vis(Vis::TERTIA->value);
    }

    public function visQuarta(): static
    {
        return $this->vis(Vis::QUARTA->value);
    }

    public function visQuinta(): static
    {
        return $this->vis(Vis::QUINTA->value);
    }

    public function visSexta(): static
    {
        return $this->vis(Vis::SEXTA->value);
    }

    public function visSeptima(): static
    {
        return $this->vis(Vis::SEPTIMA->value);
    }

    // Natures
    public function white(): static
    {
        $this->attributes['nature'] = cache()->get('migration.spell.nature.white')->id;

        return $this;
    }

    public function black(): static
    {
        $this->attributes['nature'] = cache()->get('migration.spell.nature.black')->id;

        return $this;
    }

    // Origins
    public function popular(): static
    {
        $this->attributes['origin'] = cache()->get('migration.spell.origin.all')->popular()->id;

        return $this;
    }

    public function alchemical(): static
    {
        $this->attributes['origin'] = cache()->get('migration.spell.origin.all')->alchemical()->id;

        return $this;
    }

    public function pagan(): static
    {
        $this->attributes['origin'] = cache()->get('migration.spell.origin.all')->pagan()->id;

        return $this;
    }

    public function infernal(): static
    {
        $this->attributes['origin'] = cache()->get('migration.spell.origin.all')->infernal()->id;

        return $this;
    }

    public function forbidden(): static
    {
        $this->attributes['origin'] = cache()->get('migration.spell.origin.all')->forbidden()->id;

        return $this;
    }

    // Forms
    public function talisman(): static
    {
        $this->attributes['form'] = cache()->get('migration.spell.form.all')->talisman()->id;

        return $this;
    }

    public function hex(): static
    {
        $this->attributes['form'] = cache()->get('migration.spell.form.all')->hex()->id;

        return $this;
    }

    public function summon(): static
    {
        $this->attributes['form'] = cache()->get('migration.spell.form.all')->summon()->id;

        return $this;
    }

    public function potion(): static
    {
        $this->attributes['form'] = cache()->get('migration.spell.form.all')->potion()->id;

        return $this;
    }

    public function ointment(): static
    {
        $this->attributes['form'] = cache()->get('migration.spell.form.all')->ointment()->id;

        return $this;
    }

    // Books
    public function aq3ed(): static
    {
        /** @var BookCollection $books */
        $books = cache()->get('all-books');
        return $this->book($books->aq3ed()->id);
    }

    public function demonolatreia(): static
    {
        /** @var BookCollection $books */
        $books = cache()->get('all-books');
        return $this->book($books->daemonolatreia()->id);
    }

    // Use faith
    public function useFaith(): static
    {
        $this->attributes['use_faith'] = true;

        return $this;
    }

    // Expiration
    public function noExpiration(): static
    {
        return $this->expiration('No aplicable');
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'latin' => $this->latin,
            'vis' => $this->vis,
            'spell_form_id' => $this->form,
            'spell_nature_id' => $this->nature,
            'spell_origin_id' => $this->origin,
            'book_id' => $this->book,
            'use_faith' => $this->use_faith,
            'expiration' => $this->expiration,
            'duration' => $this->duration,
            'components' => $this->components,
            'preparation' => $this->preparation,
            'description' => $this->description,
        ];
    }
}
