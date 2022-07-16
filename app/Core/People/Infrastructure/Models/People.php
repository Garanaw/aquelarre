<?php

declare(strict_types=1);

namespace Aquelarre\Core\People\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    // phpcs:ignore
    protected $table = 'people';
}
