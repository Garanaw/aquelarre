<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Migration;

use Aquelarre\Core\Framework\Infrastructure\Migration\Blueprint as CustomBlueprint;
use Closure;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Migrations\Migration as BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Collection;

abstract class Migration extends BaseMigration
{
    /** @SuppressWarnings(PHPMD.ShortVariable) */
    protected Connection $db;

    protected Builder $schema;

    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingTraversableTypeHintSpecification
    protected array $seeders = [];

    protected ?string $table = null;

    public function __construct()
    {
        $manager = app(abstract: DatabaseManager::class);
        $this->db = $manager->connection();
        $this->schema = $manager->getSchemaBuilder();
        $this->setBlueprint(blueprint: CustomBlueprint::class);
    }

    public function hasSeeders(): bool
    {
        return $this->getSeeders()->isNotEmpty();
    }

    public function getSeeders(): Collection
    {
        return Collection::wrap(value: $this->seeders);
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    protected function setBlueprint(string $blueprint): void
    {
        $this->schema->blueprintResolver(
            resolver: static fn (string $table, ?Closure $callback = null): Blueprint => new $blueprint($table, $callback)
        );
    }

    /** @SuppressWarnings(PHPMD.ShortMethodName) */
    // phpcs:ignore PSR2.Methods.MethodDeclaration.AbstractAfterVisibility -- baseline
    public abstract function up(): void;

    // phpcs:ignore PSR2.Methods.MethodDeclaration.AbstractAfterVisibility -- baseline
    public abstract function down(): void;
}
