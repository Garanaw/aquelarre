<?php

return [
    'available_domains' => [
        'shared',
        'user',
    ],
    'shared' => [
        'providers' => [
            Domain\Shared\Providers\AppServiceProvider::class,
            Domain\Shared\Providers\AuthServiceProvider::class,
            Domain\Shared\Providers\BladeServiceProvider::class,
            Domain\Shared\Providers\BroadcastServiceProvider::class,
            Domain\Shared\Providers\EventServiceProvider::class,
            Domain\Shared\Providers\RouteServiceProvider::class,
            Domain\Shared\Providers\TelescopeServiceProvider::class,
            Domain\Shared\Providers\ViewServiceProvider::class,
        ],
        'exclude_for_other_domains' => [
        ],
    ],
    'user' => [
        'providers' => [
            Domain\User\Providers\BladeServiceProvider::class,
            Domain\User\Providers\FortifyServiceProvider::class,
            Domain\User\Providers\ViewServiceProvider::class,
        ],
    ],
];
