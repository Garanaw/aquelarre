<?php

declare(strict_types=1);

namespace Database\Seeders\User;

use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

class RolesSeeder extends Seeder
{
    protected string $table = 'roles';

    public function run(): void
    {
        $this->db->table('roles')->insert($this->getData());
    }

    protected function getData(): array
    {
        return [
            [
                'name' => 'super-admin',
                'guard_name' => 'web',
                'created_at' => $this->now,
                'updated_at' => $this->now,
            ],
            [
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => $this->now,
                'updated_at' => $this->now,
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
                'created_at' => $this->now,
                'updated_at' => $this->now,
            ],
        ];
    }
}
