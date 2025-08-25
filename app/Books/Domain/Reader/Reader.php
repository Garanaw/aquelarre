<?php

declare(strict_types=1);

namespace App\Books\Domain\Reader;

use App\Books\Domain\Collection\BookCollection;
use App\Books\Infrastructure\Reader\Reader as BookReader;
use Illuminate\Cache\Repository;

class Reader
{
    public function __construct(
        private readonly Repository $cache,
        private readonly BookReader $reader,
    ) {
    }

    public function getCached(): BookCollection
    {
        return $this->cache->rememberForever(
            key: 'all-books',
            callback: fn(): BookCollection => $this->reader->all(),
        );
    }
}
