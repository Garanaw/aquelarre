<?php

declare(strict_types=1);

namespace Aquelarre\Core\User\Infrastructure\Repositories;

use Aquelarre\Core\User\Domain\Dto\NewUser;
use Aquelarre\Core\User\Infrastructure\Models\User;
use Aquelarre\Core\User\Infrastructure\Models\UserProfile;
use Illuminate\Database\DatabaseManager;
use Illuminate\Hashing\HashManager;

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
                'email_verified_at' => $data->email_verified_at,
            ];

            return tap(
                value: $this->user->newQuery()->create($userData),
                callback: static function (User $user) use ($data): void {
                    $user->assignRole($data->role_name);
                    $user->profile()->save(new UserProfile());
                }
            );
        });
    }
}
