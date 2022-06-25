<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Broadcast::routes();

        // phpcs:ignore PEAR.Files.IncludingFile.UseInclude -- baseline
        require base_path('routes/channels.php');
    }
}
