<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Seed;

use Aquelarre\Core\Framework\Infrastructure\Migration\Migration;
use Aquelarre\Core\Shared\Domain\Support\Str;
use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Events\MigrationEnded as Event;
use Illuminate\Foundation\Application;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\NullOutput;

class MigrationEnded
{
    public function __construct(
        private readonly ConsoleOutput $output,
        private readonly Application $app
    ) {
    }

    public function handle(Event $event): void
    {
        if ($event->method !== 'up') {
            return;
        }

        /** @var Migration $migration */
        $migration = $event->migration;

        // Not a migration we care about
        if (!$migration instanceof Migration) {
            return;
        }

        if ($migration->hasSeeders() === false) {
            return;
        }

        $this->seedMigration(migration: $migration);
    }

    private function seedMigration(Migration $migration): void
    {
        $migration->getSeeders()->each(function (string $seederName): void {
            $name = $this->getSeederName(path: $seederName);
            $seeder = $this->app->make(abstract: $seederName);
            $this->write(
                Task::class,
                sprintf('Running seeder %s', Str::of($name)->explode(delimiter: '\\')->last()),
                static fn () => $seeder->run()
            );
        });
    }

    private function getSeederName(string $path): string
    {
        $pieces = explode(separator: '/', string: $path);
        return end($pieces);
    }

    private function write(string $component, mixed ...$arguments): void
    {
        $this->output?->writeln('');
        with(new $component(
            $this->output ?: new NullOutput()
        ))->render(...$arguments);
    }
}
