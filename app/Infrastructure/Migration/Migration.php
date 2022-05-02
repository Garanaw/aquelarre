<?php

declare(strict_types=1);

namespace Infrastructure\Migration;

use Infrastructure\Migration\Blueprint as CustomBlueprint;
use Closure;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Migrations\Migration as BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Collection;

abstract class Migration extends BaseMigration
{
    protected Connection $db;
    protected Builder $schema;
    protected array $seeders = [];
    protected ?string $table = null;

    public function __construct()
    {
        $manager = app(DatabaseManager::class);
        $this->db = $manager->connection();
        $this->schema = $manager->getSchemaBuilder();
        $this->setBlueprint(CustomBlueprint::class);
    }

    public function hasSeeders(): bool
    {
        return $this->getSeeders()->isNotEmpty();
    }

    public function getSeeders(): Collection
    {
        return Collection::wrap($this->seeders);
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    protected function setBlueprint(string $blueprint): void
    {
        $this->schema->blueprintResolver(
            fn (string $table, ?Closure $callback = null): Blueprint => new $blueprint($table, $callback)
        );
    }

    public abstract function up(): void;

    public abstract function down(): void;
}
