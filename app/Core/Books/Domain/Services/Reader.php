<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Domain\Services;

use Aquelarre\Core\Books\Domain\Dto\Search;
use Aquelarre\Core\Books\Domain\Dto\SearchResult;
use Aquelarre\Core\Books\Infrastructure\Repositories\Reader as Repository;

class Reader
{
    public function __construct(
        private readonly Repository $reader,
    ) {
    }

    public function search(Search $search): SearchResult
    {
        return $this->reader->search(search: $search);
    }
}
