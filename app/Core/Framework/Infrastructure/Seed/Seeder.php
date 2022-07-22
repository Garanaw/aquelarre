<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed;

use Aquelarre\Core\Framework\Infrastructure\Seed\Loaders\Loader;
use Illuminate\Cache\Repository as Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Seeder as BaseSeeder;
use Illuminate\Support\Carbon;
use Symfony\Component\Console\Output\ConsoleOutput;

abstract class Seeder extends BaseSeeder
{
    protected Carbon $now;

    public function __construct(
        protected readonly DatabaseManager $db,
        protected readonly ConsoleOutput $output,
        protected readonly Cache $cache,
        protected readonly Application $app
    ) {
        $this->now = Carbon::now();
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingAnyTypeHint -- baseline
    protected function note($message): void
    {
        $this->output?->writeln(messages: $message);
    }

    public function getTable(): ?string
    {
        return $this->table;
    }

    protected function resetTable(?string $table = null): void
    {
        $table = $table ?? $this->getTable();

        // phpcs:ignore Generic.PHP.ForbiddenFunctions.Found -- baseline
        if (is_null(value: $table)) {
            return;
        }

        $this->db->table(table: $table)->delete();
        $this->setAutoIncrement($table, 1);
        $this->note(message: '<info>Table reset</info>: ' . $table);
    }

    protected function setAutoIncrement(string $table, int $autoIncrement): void
    {
        try {
            $this->db->statement(query: sprintf('ALTER TABLE `%s` AUTO_INCREMENT = %d;', $table, $autoIncrement));
        } catch (\Throwable) {
            return;
        }
    }

    protected function getLoader(string $class): Loader
    {
        return $this->app->make(abstract: $class);
    }

    protected function getLoadedLoader(string $class): Loader
    {
        return tap(
            value: $this->getLoader(class: $class),
            callback: static fn (Loader $loader) => $loader->load()
        );
    }

    // phpcs:ignore PSR2.Methods.MethodDeclaration.AbstractAfterVisibility -- baseline
    public abstract function run(): bool;

    // phpcs:ignore PSR2.Methods.MethodDeclaration.AbstractAfterVisibility, SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingTraversableTypeHintSpecification -- baseline
    protected abstract function getData(): array;
}
