<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Domain\Services;

use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Aquelarre\Core\Books\Infrastructure\Repositories\Reader;
use Aquelarre\Core\User\Domain\Dto\NewUser;
use Aquelarre\Core\User\Domain\Enum\Role;
use Aquelarre\Core\User\Infrastructure\Models\User;
use Aquelarre\Core\User\Infrastructure\Repositories\Writer as Repository;
use Illuminate\Database\Eloquent\Collection;

class Writer
{
    public function __construct(
        private readonly Repository $writer,
        private readonly Reader $bookReader,
    ) {
    }

    public function create(NewUser $data): User
    {
        return tap(
            value: $this->writer->create($data),
            callback: function (User $user) use ($data): void {
                match ($data->roleName) {
                    Role::User->value => $this->addBookToUser(
                        user: $user,
                        book: $this->bookReader->getAq3Ed(),
                    ),
                    Role::Admin->value, Role::SuperAdmin->value => $this->addBooksToUser(
                        user: $user,
                        books: $this->bookReader->getAll()
                    ),
                };
            }
        );
    }

    public function addBookToUser(User $user, Book $book): void
    {
        $this->writer->addBookToUser($user, $book);
    }

    /** @param Collection<int, Book> $books */
    public function addBooksToUser(User $user, Collection $books): void
    {
        $this->writer->addBooksToUser($user, $books);
    }
}
