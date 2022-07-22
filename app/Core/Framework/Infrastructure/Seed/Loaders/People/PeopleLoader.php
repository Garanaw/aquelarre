<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\People;

use Aquelarre\Core\Framework\Domain\Enum\TimesInSeconds;
use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Cache\Repository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

class PeopleLoader implements Loader
{
    private ?Collection $people = null;

    public function __construct(
        private readonly DatabaseManager $db,
        private readonly Repository $cache,
    ) {
    }

    public function load(): Collection
    {
        return $this->people = $this->cache->remember(
            key: 'seed-people',
            ttl: TimesInSeconds::FiveMinutes->value,
            callback: fn(): Collection => $this->db->table(table: 'people')
                ->select('id', 'name')
                ->get()
                ->mapWithKeys(callback: static fn (object $people) => [
                    Str::slug($people->name) => $people->id,
                ])
        );
    }

    public function people(string $name): int
    {
        return $this->people->get(Str::slug($name));
    }

    public function castilian(): int
    {
        return $this->people('castellano');
    }

    public function galician(): int
    {
        return $this->people('gallego');
    }

    public function vasque(): int
    {
        return $this->people('vasco');
    }

    public function asturian(): int
    {
        return $this->people('asturleones');
    }

    public function catalan(): int
    {
        return $this->people('catalán');
    }

    public function navarro(): int
    {
        return $this->people('navarro');
    }

    public function aragon(): int
    {
        return $this->people('aragonés');
    }

    public function mudejar(): int
    {
        return $this->people('mudejar');
    }

    public function jewish(): int
    {
        return $this->people('judío');
    }

    public function arabic(): int
    {
        return $this->people('árabe');
    }

    public function mozarabic(): int
    {
        return $this->people('mozarabe');
    }

    public function portuguese(): int
    {
        return $this->people('portugués');
    }
}
