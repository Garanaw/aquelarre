<?php

declare(strict_types=1);

namespace Aquelarre\Core\Characteristics\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $prefix
 */
class Characteristic extends Model
{
    use HasFactory;

    public function getId(): int
    {
        return $this->id;
    }
}
