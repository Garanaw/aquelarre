<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\Database\Builder;

use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Aquelarre\Core\Framework\Infrastructure\Database\Builder\Builder;
use Aquelarre\Spell\Infrastructure\Models\SpellForm;
use Aquelarre\Spell\Infrastructure\Models\SpellNature;
use Aquelarre\Spell\Infrastructure\Models\SpellOrigin;

class SpellBuilder extends Builder
{
    public function inVis(int $vis): static
    {
        return $this->where('vis', '=', $vis);
    }

    public function inOriginId(int $origin): static
    {
        return $this->where('spell_origin_id', '=', $origin);
    }

    public function inOrigin(SpellOrigin $origin): static
    {
        return $this->inOriginId($origin->id);
    }

    public function inNatureId(int $nature): static
    {
        return $this->where('spell_nature_id', '=', $nature);
    }

    public function inNature(SpellNature $nature): static
    {
        return $this->inNatureId($nature->id);
    }

    public function inFormId(int $form): static
    {
        return $this->where('spell_form_id', '=', $form);
    }

    public function inForm(SpellForm $form): static
    {
        return $this->inFormId($form->id);
    }

    public function inBookId(int $book): static
    {
        return $this->where('book_id', '=', $book);
    }

    public function inBook(Book $book): static
    {
        return $this->inBookId($book->id);
    }
}
