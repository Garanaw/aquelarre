<?php

declare(strict_types=1);

namespace Aquelarre;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;

class ConsoleKernel extends Kernel
{
    /**
     * @param Schedule $schedule
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    protected function commands(): void
    {
        $this->load(paths: __DIR__.'/Commands');

        collect(value: $this->app['config']['domain.available_domains'])
            ->each(function (?array $subdomains, string $domain) {
                $this->registerDomainCommands(domain: $domain);

                if (empty($subdomains)) {
                    return;
                }

                collect(value: $subdomains)->each(
                    callback: fn (string $subdomain) => $this->registerDomainCommands(domain: $domain, subdomain: $subdomain)
                );
            });

        require base_path(path: 'routes/console.php');
    }

    protected function registerDomainCommands(string $domain, ?string $subdomain = null): void
    {
        $format = $subdomain
            ? sprintf('app/%s/%s/Application/Commands', ucfirst($domain), ucfirst($subdomain))
            : sprintf('app/%s/Application/Commands', ucfirst($domain));

        $this->load(paths: base_path(path: $format));
    }
}
