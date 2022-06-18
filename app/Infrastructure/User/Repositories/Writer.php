<?php

declare(strict_types=1);

namespace Infrastructure\User\Repositories;

use Domain\User\Dto\NewUser;
use Illuminate\Database\DatabaseManager;
use Illuminate\Hashing\HashManager;
use Infrastructure\User\Models\User;
use Infrastructure\User\Models\UserProfile;

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
        return $this->db->transaction(function () use ($data) {
            $userData = [
                'name' => $data->name,
                'email' => $data->email,
                'password' => $this->hashManager->make($data->password),
                'email_verified_at' => $data->email_verified_at,
            ];

            return tap($this->user->newQuery()->create($userData), function (User $user) use ($data) {
                $user->assignRole($data->role_name);
                $user->profile()->save(new UserProfile());
            });
        });
    }
}
