<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed;

use Illuminate\Cache\Repository as Cache;
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

    // phpcs:ignore PSR2.Methods.MethodDeclaration.AbstractAfterVisibility -- baseline
    public abstract function run(): void;

    // phpcs:ignore PSR2.Methods.MethodDeclaration.AbstractAfterVisibility, SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingTraversableTypeHintSpecification -- baseline
    protected abstract function getData(): array;
}
