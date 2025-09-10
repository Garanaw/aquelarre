<?php

declare(strict_types=1);

use Illuminate\Support\Arr;

$primes = json_decode(
    json: env(key: 'OPTIMUS_PRIME_KEYS', default: '{"main":[], "user":[], "kingdom":[]}'),
    associative: true,
    flags: JSON_THROW_ON_ERROR
);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Optimus Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for Optimus, which is a library
    | that allows you to obfuscate your database IDs. You can set the
    | prime number, the inverse and the random number (the salt).
    |
    */
    'connections' => [
        'main' => [
            'prime' => Arr::get($primes, 'main.prime'),
            'inverse' => Arr::get($primes, 'main.inverse'),
            'random' => Arr::get($primes, 'main.random'),
        ],

        'user' => [
            'prime' => Arr::get($primes, 'user.prime'),
            'inverse' => Arr::get($primes, 'user.inverse'),
            'random' => Arr::get($primes, 'user.random'),
        ],

        'book' => [
            'prime' => Arr::get($primes, 'book.prime'),
            'inverse' => Arr::get($primes, 'book.inverse'),
            'random' => Arr::get($primes, 'book.random'),
        ],

        'kingdom' => [
            'prime' => Arr::get($primes, 'kingdom.prime'),
            'inverse' => Arr::get($primes, 'kingdom.inverse'),
            'random' => Arr::get($primes, 'kingdom.random'),
        ],
    ],

];
