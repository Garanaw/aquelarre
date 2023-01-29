<?php

declare(strict_types=1);

namespace Aquelarre\Core\Framework\Infrastructure\Database\Builder;

use Aquelarre\Core\User\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Builder extends EloquentBuilder
{
    public function inUsersBooks(User $user): static
    {
        return $this->whereIn('book_id', $user->books->pluck('id'));
    }
}
