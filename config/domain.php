<?php

return [
    'available_domains' => [
        'shared',
        'user',
    ],
    'shared' => [
        'providers' => [
            Aquelarre\Core\Framework\Providers\AppServiceProvider::class,
            Aquelarre\Core\Framework\Providers\AuthServiceProvider::class,
            Aquelarre\Core\Framework\Providers\BladeServiceProvider::class,
            Aquelarre\Core\Framework\Providers\BroadcastServiceProvider::class,
            Aquelarre\Core\Framework\Providers\EventServiceProvider::class,
            Aquelarre\Core\Framework\Providers\RouteServiceProvider::class,
            Aquelarre\Core\Framework\Providers\TelescopeServiceProvider::class,
            Aquelarre\Core\Framework\Providers\ViewServiceProvider::class,
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
