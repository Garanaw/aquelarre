<?php

declare(strict_types=1);

namespace Application;

use Domain\Shared\Support\Str;
use Illuminate\Console\Application;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Support\Arr;
use ReflectionClass;
use Symfony\Component\Finder\Finder;

class ConsoleKernel extends Kernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    protected function commands(): void
    {
        $this->load(paths: __DIR__.'/Commands');

        collect(value: $this->app['config']['domain.available_domains'])
            ->map(callback: static function (string $domainName): array {
                return [
                    'domain' => $domainName,
                    'path' => sprintf('%s/%s/Commands', __DIR__, Str::ucfirst($domainName)),
                ];
            })
            ->each(callback: function (array $domain)  {
                $this->load(
                    paths: $domain['path'],
                    namespace: ''
                );
            });

        require base_path(path: 'routes/console.php');
    }

    protected function load($paths, ?string $namespace = null)
    {
        if ($namespace === null) {
            parent::load(paths: $paths);
            return;
        }

        $paths = collect(Arr::wrap($paths))
            ->unique()
            ->filter(callback: fn ($path): bool => is_dir($path));

        if ($paths->isEmpty()) {
            return;
        }

        foreach ((new Finder)->in(dirs: $paths->toArray())->files() as $command) {
            $command = $namespace.str_replace(
                search: ['/', '.php'],
                replace: ['\\', ''],
                subject: Str::after(subject: $command->getRealPath(), search: realpath(path: app_path()).DIRECTORY_SEPARATOR)
            );

            if (is_subclass_of(object_or_class: $command, class: Command::class) === false) {
                continue;
            }

            if ((new ReflectionClass(objectOrClass: $command))->isAbstract()) {
                continue;
            }

            Application::starting(callback: function (Application $artisan) use ($command) {
                $artisan->resolve(command: $command);
            });
        }
    }
}
