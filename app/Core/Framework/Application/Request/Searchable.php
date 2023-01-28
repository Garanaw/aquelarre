<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Application\Request;

use Aquelarre\Core\Framework\Domain\Search\Searcher;

interface Searchable
{
    public function getSearcher(): Searcher;
}
