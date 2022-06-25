<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Infrastructure\Repositories;

use Aquelarre\Core\Books\Infrastructure\Models\Book;
use Aquelarre\Core\User\Domain\Dto\NewUser;
use Aquelarre\Core\User\Infrastructure\Models\User;
use Aquelarre\Core\User\Infrastructure\Models\UserProfile;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\Arr;

class Writer
{
    public function __construct(
        private readonly DatabaseManager $db,
        private readonly HashManager $hashManager,
        private readonly User $user,
    ) {
    }

    public function create(NewUser $data): User
    {
        return $this->db->transaction(callback: function () use ($data) {
            $userData = [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $this->hashManager->make($data->password),
                'email_verified_at' => $data->emailVerifiedAt->toDateTimeString(),
            ];

            return tap(
                value: $this->user->newQuery()->create($userData),
                callback: function (User $user) use ($data): void {
                    $this->addRolesToUser(user: $user, roles: Arr::wrap($data->roleName));
                    $user->profile()->save(new UserProfile());
                }
            );
        });
    }

    public function addRolesToUser(User $user, array $roles): void
    {
        $user->assignRole($roles);
    }

    public function addBookToUser(User $user, Book $book): void
    {
        $user->books()->attach($book);
    }

    public function addBooksToUser(User $user, Collection $books): void
    {
        $user->books()->attach(
            id: $books->map(callback: static fn (Book $book): int => $book->getId())->toArray(),
        );
    }
}
