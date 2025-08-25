<?php

declare(strict_types=1);

namespace App\Game\Core\Features\Characteristics\Domain\Reader;

use App\Game\Core\Features\Characteristics\Domain\Collection\CharacteristicCollection;
use App\Game\Core\Features\Characteristics\Infrastructure\Reader\Reader as CharacteristicsReader;
use Illuminate\Cache\Repository;

class Reader
{
    public function __construct(
        private readonly Repository $cache,
        private readonly CharacteristicsReader $reader
    ) {
    }

    public function getCached(): CharacteristicCollection
    {
        return $this->cache->rememberForever(
            key: 'all-characteristics',
            callback: fn(): CharacteristicCollection => $this->reader->all()
        );
    }
}
