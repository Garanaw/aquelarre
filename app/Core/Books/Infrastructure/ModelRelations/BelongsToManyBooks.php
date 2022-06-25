<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Infrastructure\ModelRelations;

use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToManyBooks
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }
}
