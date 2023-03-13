<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Domain\Dto;

use Aquelarre\Core\User\Infrastructure\Models\User;
use Illuminate\Support\Fluent;

/**
 * @property \Illuminate\Database\Eloquent\Collection $books
 * @property Search $search
 */
class SearchResult extends Fluent
{
    public function getUser(): User
    {
        return $this->search->user;
    }
}
