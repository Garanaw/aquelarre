<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Domain\SearchResults;

use Aquelarre\Core\Framework\Domain\Search\Searcher;
use Aquelarre\Core\Framework\Domain\SearchResult\SearchResult;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Fluent;

/**
 * @property Searcher $searcher
 * @property LengthAwarePaginator $paginator
 * @property Collection|<int, \Aquelarre\Spell\Infrastructure\Models\SpellForm> $forms
 * @property Collection|<int, \Aquelarre\Spell\Infrastructure\Models\SpellOrigin> $origins
 * @property Collection|<int, \Aquelarre\Spell\Infrastructure\Models\SpellNature> $natures
 * @property array|<int, \Aquelarre\Spell\Domain\Enum\Vis> $vises
 * @property Collection|<int, \Aquelarre\Core\Books\Infrastructure\Models\Book> $books
 */
class IndexResult extends Fluent implements SearchResult
{
    public function getSearcher(): Searcher
    {
        return $this->searcher;
    }

    public function setBooks(Collection $books): static
    {
        return new static([
            'searcher' => $this->searcher,
            'paginator' => $this->paginator,
            'forms' => $this->forms,
            'origins' => $this->origins,
            'natures' => $this->natures,
            'vises' => $this->vises,
            'books' => $books,
        ]);
    }
}
