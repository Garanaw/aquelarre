<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Book extends Model
{
    protected $casts = [
        'id' => 'int',
    ];

    public function getId(): int
    {
        return $this->id;
    }
}
