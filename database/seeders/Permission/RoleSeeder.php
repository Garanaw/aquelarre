<?php

declare(strict_types=1);

namespace Database\Seeders\Permission;

use App\Permission\Domain\Enum\Role;
use Garanaw\SeedableMigrations\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): bool
    {
        return $this->db->table('roles')->insert($this->getData());
    }

    protected function getData(): array
    {
        $now = now();
        $callback = static fn (array $role) => [
            ...$role,
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        return array_map($callback, [
            [
                'name' => Role::ADMIN->value,
                'display_name' => 'Administrator',
                'description' => 'Full access to the system',
            ],
            [
                'name' => Role::MODERATOR->value,
                'display_name' => 'Moderator',
                'description' => 'Can manage content and users',
            ],
            [
                'name' => Role::EDITOR->value,
                'display_name' => 'Editor',
                'description' => 'Can edit content but not manage users',
            ],
            [
                'name' => Role::PLAYER->value,
                'display_name' => 'Player',
                'description' => 'Regular user with limited access',
            ],
        ]);
    }
}
