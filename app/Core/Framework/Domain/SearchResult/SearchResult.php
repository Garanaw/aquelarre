<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Domain\SearchResult;

use Aquelarre\Core\Framework\Domain\Search\Searcher;

interface SearchResult
{
    public function getSearcher(): Searcher;
}
