<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Laravel\Telescope\EntryType;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    private const NOT_RECORDABLE = [
        EntryType::CACHE,
        EntryType::VIEW,
        EntryType::MODEL,
    ];

    public function register()
    {
        Telescope::night();

        $this->hideSensitiveRequestDetails();

        Telescope::filter(function (IncomingEntry $entry) {
            return $this->app->isLocal()
                || !in_array($entry->type, self::NOT_RECORDABLE);
        });
    }

    protected function hideSensitiveRequestDetails(): void
    {
        if ($this->app->isLocal()) {
            return;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
    }

    protected function authorization(): void
    {
        Telescope::auth(static function ($request) {
            $user = $request->user();
            return $user !== null && $user->isAuthorized();
        });
    }
}
