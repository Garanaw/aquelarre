<?php

declare(strict_types=1);

namespace Aquelarre\Core\Books\Domain\Dto;

use Aquelarre\Core\User\Infrastructure\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class SearchResult extends DataTransferObject
{
    readonly public Collection $books;

    readonly public Search $search;

    public function getUser(): User
    {
        return $this->search->user;
    }
}
