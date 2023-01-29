<?php

declare(strict_types=1);

namespace Aquelarre\Spell\Domain\Services;

use Aquelarre\Core\Framework\Domain\Search\Searcher;
use Aquelarre\Core\Framework\Domain\SearchResult\SearchResult;
use Aquelarre\Spell\Infrastructure\Repositories\SpellFinder as SpellFinderRepository;

readonly class SpellFinder
{
    public function __construct(
        private SpellFinderRepository $spellFinder
    ) {
    }

    public function paginate(Searcher $searcher): SearchResult
    {
        return $this->spellFinder->paginate($searcher);
    }
}
