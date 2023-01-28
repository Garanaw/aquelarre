<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Domain\SearchResults;

use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Aquelarre\Core\Framework\Domain\Search\Searcher;
use Aquelarre\Core\Framework\Domain\SearchResult\SearchResult;
use Aquelarre\Spell\Domain\Enum\Vis;
use Aquelarre\Spell\Infrastructure\Models\SpellForm;
use Aquelarre\Spell\Infrastructure\Models\SpellNature;
use Aquelarre\Spell\Infrastructure\Models\SpellOrigin;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class IndexResult extends DataTransferObject implements SearchResult
{
    public readonly Searcher $searcher;

    public readonly LengthAwarePaginator $paginator;

    /** @var Collection|<int, SpellForm> */
    public readonly Collection $forms;

    /** @var Collection|<int, SpellOrigin> */
    public readonly Collection $origins;

    /** @var Collection|<int, SpellNature> */
    public readonly Collection $natures;

    /** @var array|<int, Vis> */
    public readonly array $vises;

    /** @var Collection|<int, Book> */
    public readonly Collection $books;

    public function getSearcher(): Searcher
    {
        return $this->searcher;
    }

    public function setBooks(Collection $books): static
    {
        return new static(
            searcher: $this->searcher,
            paginator: $this->paginator,
            forms: $this->forms,
            origins: $this->origins,
            natures: $this->natures,
            vises: $this->vises,
            books: $books,
        );
    }
}
