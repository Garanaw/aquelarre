<?php

declare(strict_types=1);

use Jenssegers\Optimus\Optimus;

if (!function_exists('id_encode')) {
    function id_encode(int $id): int
    {
        return app()->make(Optimus::class)->encode($id);
    }
}

if (!function_exists('id_decode')) {
    function id_decode(int $id): int
    {
        return app()->make(Optimus::class)->decode($id);
    }
}
