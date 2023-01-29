<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Infrastructure\Repositories;

use Aquelarre\Core\Framework\Domain\Search\Searcher;
use Aquelarre\Core\Framework\Domain\SearchResult\SearchResult;
use Aquelarre\Spell\Domain\Enum\Vis;
use Aquelarre\Spell\Domain\SearchResults\IndexResult;
use Aquelarre\Spell\Infrastructure\Database\Builder\SpellBuilder;
use Aquelarre\Spell\Infrastructure\Models\Spell;
use Aquelarre\Spell\Infrastructure\Models\SpellForm;
use Aquelarre\Spell\Infrastructure\Models\SpellNature;
use Aquelarre\Spell\Infrastructure\Models\SpellOrigin;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Database\Eloquent\Collection;

readonly class SpellFinder
{
    public function __construct(
        private Spell $spell,
        private SpellForm $form,
        private SpellOrigin $origin,
        private SpellNature $nature,
        private Repository $cache,
    ) {
    }

    public function paginate(Searcher $searcher): SearchResult
    {
        $spells = $this->spell->newQuery()
            ->with(['form', 'origin', 'nature', 'book'])
            ->when($searcher->name, static fn (SpellBuilder $query) => $query->where('name', 'like', "%{$searcher->name}%"))
            ->when($searcher->form, static fn (SpellBuilder $query) => $query->inFormId($searcher->form))
            ->when($searcher->origin, static fn (SpellBuilder $query) => $query->inOriginId($searcher->origin))
            ->when($searcher->nature, static fn (SpellBuilder $query) => $query->inNatureId($searcher->nature))
            ->when($searcher->vis, static fn (SpellBuilder $query) => $query->inVis($searcher->vis))
            ->when($searcher->book, static fn (SpellBuilder $query) => $query
                ->where(static fn () => $query
                    ->where('book_id', '=', $searcher->book)
                    ->inUsersBooks($searcher->user)
                )
            )
            ->when(!$searcher->book, static fn (SpellBuilder $query) => $query->inUsersBooks($searcher->user));

        return new IndexResult(
            searcher: $searcher,
            paginator: $spells->paginate(),
            forms: $this->getAllForms(),
            origins: $this->getAllOrigins(),
            natures: $this->getAllNatures(),
            vises: Vis::getIterable(),
        );
    }

    public function getAllForms(): Collection
    {
        return $this->cache->rememberForever('spell.forms', fn () => $this->form->all());
    }

    public function getAllOrigins(): Collection
    {
        return $this->cache->rememberForever('spell.origins', fn () => $this->origin->all());
    }

    public function getAllNatures(): Collection
    {
        return $this->cache->rememberForever('spell.natures', fn () => $this->nature->all());
    }
}
