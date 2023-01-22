<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\DBFluent;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Book\BookLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\FormLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\NatureLoader;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Spell\OriginLoader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Aquelarre\Spell\Domain\Enum\Vis;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;
use Illuminate\Support\Pluralizer;

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

    public function latin(?string $latin): static
    {
        $this->attributes['latin'] = $latin;

        return $this;
    }

    public function vis(Vis $vis): static
    {
        $this->attributes['vis'] = $vis->value;

        return $this;
    }

    public function visPrima(): static
    {
        return $this->vis(Vis::PRIMA);
    }

    public function visSecunda(): static
    {
        return $this->vis(Vis::SECUNDA);
    }

    public function visTertia(): static
    {
        return $this->vis(Vis::TERTIA);
    }

    public function visQuarta(): static
    {
        return $this->vis(Vis::QUARTA);
    }

    public function visQuinta(): static
    {
        return $this->vis(Vis::QUINTA);
    }

    public function visSexta(): static
    {
        return $this->vis(Vis::SEXTA);
    }

    public function visSeptima(): static
    {
        return $this->vis(Vis::SEPTIMA);
    }

    public function form(int $form): static
    {
        $this->attributes['spell_form_id'] = $form;

        return $this;
    }

    public function talisman(FormLoader $forms): static
    {
        return $this->form($forms->talisman());
    }

    public function summon(FormLoader $forms): static
    {
        return $this->form($forms->summon());
    }

    public function hex(FormLoader $forms): static
    {
        return $this->form($forms->hex());
    }

    public function potion(FormLoader $forms): static
    {
        return $this->form($forms->potion());
    }

    public function ointment(FormLoader $forms): static
    {
        return $this->form($forms->ointment());
    }

    public function nature(int $nature): static
    {
        $this->attributes['spell_nature_id'] = $nature;

        return $this;
    }

    public function white(NatureLoader $natures): static
    {
        return $this->nature($natures->white());
    }

    public function black(NatureLoader $natures): static
    {
        return $this->nature($natures->black());
    }

    public function origin(int $origin): static
    {
        $this->attributes['spell_origin_id'] = $origin;

        return $this;
    }

    public function popular(OriginLoader $origins): static
    {
        return $this->origin($origins->popular());
    }

    public function alchemical(OriginLoader $origins): static
    {
        return $this->origin($origins->alchemical());
    }

    public function pagan(OriginLoader $origins): static
    {
        return $this->origin($origins->pagan());
    }

    public function infernal(OriginLoader $origins): static
    {
        return $this->origin($origins->infernal());
    }

    public function forbidden(OriginLoader $origins): static
    {
        return $this->origin($origins->forbidden());
    }

    public function book(int $book): static
    {
        $this->attributes['book_id'] = $book;

        return $this;
    }

    public function aq3ed(BookLoader $books): static
    {
        return $this->book($books->aq3ed());
    }

    public function demonolatreia(BookLoader $books): static
    {
        return $this->book($books->daemonolatreia());
    }

    public function useFaith(): static
    {
        $this->attributes['use_faith'] = true;

        return $this;
    }

    public function expiration(string $expiration): static
    {
        $this->attributes['expiration'] = $expiration;

        return $this;
    }

    public function noExpiration(): static
    {
        return $this->expiration('No aplicable');
    }

    public function duration(string $duration): static
    {
        $this->attributes['duration'] = $duration;

        return $this;
    }

    public function components(string $components): static
    {
        $this->attributes['components'] = $components;

        return $this;
    }

    public function preparation(string $preparation): static
    {
        $this->attributes['preparation'] = $preparation;

        return $this;
    }

    public function description(string $description): static
    {
        $this->attributes['description'] = $description;

        return $this;
    }
}
