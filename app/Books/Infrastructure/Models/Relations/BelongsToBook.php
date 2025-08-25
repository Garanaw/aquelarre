<?php

declare(strict_types=1);

namespace App\Books\Infrastructure\Models\Relations;

use App\Books\Infrastructure\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToBook
{
    public function book(): BelongsTo
    {
        return $this->belongsTo(related: Book::class);
    }
}
