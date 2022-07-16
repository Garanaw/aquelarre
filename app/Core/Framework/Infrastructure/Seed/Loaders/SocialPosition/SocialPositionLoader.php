<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\SocialPosition;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class SocialPositionLoader implements Loader
{
    private ?Collection $socialPositions = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache
    ) {
        $this->cache->forget('seed-social-positions');
        $this->cache->forget('seed-christian-social-positions');
        $this->cache->forget('seed-judaic-social-positions');
        $this->cache->forget('seed-muslim-social-positions');
    }

    public function load(): Collection
    {
        return $this->socialPositions = $this->cache->remember(
            key: 'seed-social-positions',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'social_positions', as: 'sp')
                ->join(table: 'societies as s', first: 'sp.society_id', operator: '=', second: 's.id')
                ->select(columns: [
                    'sp.id',
                    'sp.name',
                    's.name as society',
                ])
                ->orderBy(column: 'sp.id')
                ->get()
        );
    }

    public function getSocialPositions(): Collection
    {
        return $this->socialPositions;
    }

    public function christian(): ChristianSocialPositions
    {
        return $this->cache->remember(
            key: 'seed-christian-social-positions-society',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): ChristianSocialPositions => new ChristianSocialPositions(
                socialPositions: $this->socialPositions->filter(
                    callback: static fn (object $socialPosition): bool => Str::slugsMatch(
                        first: $socialPosition->society,
                        second: 'cristiana'
                    ),
                ),
            )
        );
    }

    public function judaic(): JudaicSocialPositions
    {
        return $this->cache->remember(
            key: 'seed-judaic-social-positions-society',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): JudaicSocialPositions => new JudaicSocialPositions(
                socialPositions: $this->socialPositions->filter(
                    callback: static fn (object $socialPosition): bool => Str::slugsMatch(
                        first: $socialPosition->society,
                        second: 'judía'
                    )
                ),
            )
        );
    }

    public function muslim(): MuslimSocialPositions
    {
        return $this->cache->remember(
            key: 'seed-muslim-social-positions-society',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): MuslimSocialPositions => new MuslimSocialPositions(
                socialPositions: $this->socialPositions->filter(
                    callback: static fn (object $socialPosition): bool => Str::slugsMatch(
                        first: $socialPosition->society,
                        second: 'islámica'
                    ),
                ),
            )
        );
    }
}
