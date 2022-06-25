<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Aquelarre\Core\Framework\Infrastructure\Seed\MigrationEnded as MigrationEndedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Database\Events\MigrationEnded as MigrationEndedEvent;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint -- baseline
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MigrationEndedEvent::class => [
            MigrationEndedListener::class,
        ],
    ];

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
