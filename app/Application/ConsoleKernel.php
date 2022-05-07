<?php

declare(strict_types=1);

namespace Application;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Support\Str;

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

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        foreach ($this->app['config']['domain.available_domains'] as $domainName) {
            $this->load(sprintf('%s/%s/Commands', __DIR__, Str::ucfirst($domainName)));
        }

        require base_path('routes/console.php');
    }
}
