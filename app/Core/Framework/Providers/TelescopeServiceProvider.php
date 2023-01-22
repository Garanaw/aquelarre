<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Providers;

use Illuminate\Http\Request;
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

    public function register(): void
    {
        Telescope::night();

        $this->hideSensitiveRequestDetails();

        Telescope::filter(callback: function (IncomingEntry $entry) {
            return $this->app->isLocal()
                || !in_array($entry->type, self::NOT_RECORDABLE);
        });
    }

    protected function hideSensitiveRequestDetails(): void
    {
        if ($this->app->isLocal()) {
            return;
        }

        Telescope::hideRequestParameters(attributes: ['_token']);

        Telescope::hideRequestHeaders(headers: [
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
    }

    protected function authorization(): void
    {
        Telescope::auth(callback: static function (Request $request): bool {
            return $request->user()?->isAuthorized() ?? false;
        });
    }
}
