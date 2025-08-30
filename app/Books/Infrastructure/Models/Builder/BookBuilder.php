<?php

declare(strict_types=1);

namespace App\Books\Infrastructure\Models\Builder;

use App\User\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Builder;

class BookBuilder extends Builder
{
    public function ownedByUser(User $user): static
    {
        return $this->whereIn(
            column: 'id',
            values: $user->books()->get(['books.id'])->pluck('id')->toArray(),
        );
    }
}
