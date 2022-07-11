<?php

declare(strict_types=1);

namespace Aquelarre\Core\Kingdom\Infrastructure\Models;

use Aquelarre\Core\Framework\Infrastructure\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kingdom extends Model
{
    use HasFactory;

    // phpcs:ignore-next-line
    protected $casts = [
        'name' => AsStringable::class,
        'peninsular' => 'boolean',
        'description' => AsStringable::class,
    ];
}
