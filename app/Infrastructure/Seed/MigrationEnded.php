<?php

declare(strict_types=1);

namespace Infrastructure\Seed;

use Infrastructure\Migration\Migration;
use Illuminate\Database\Events\MigrationEnded as Event;
use Illuminate\Foundation\Application;
use Symfony\Component\Console\Output\ConsoleOutput;

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

        $this->seedMigration($migration);
    }

    private function seedMigration(Migration $migration): void
    {
        $startTime = microtime(true);

        $migration->getSeeders()->each(function (string $seederName): void {
            $name = $this->getSeederName($seederName);
            $seeder = $this->app->make($seederName);
            $this->note(sprintf('<info>Running seeder</info>: %s', $name));
            $seeder->run();
        });

        $runTime = round(microtime(true) - $startTime, 2);

        $this->note(sprintf('<info>Seeded:</info> %s (%d seconds)', $this->getMigrationName($migration), $runTime));
    }

    private function getMigrationName(Migration $migration): string
    {
        return str_replace('.php', '', get_class($migration));
    }

    private function getSeederName(string $path): string
    {
        $pieces = explode('/', $path);
        return end($pieces);
    }

    private function note(string $message): void
    {
        $this->output?->writeln($message);
    }
}
