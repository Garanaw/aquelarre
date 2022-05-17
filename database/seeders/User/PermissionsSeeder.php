<?php

declare(strict_types=1);

namespace Database\Seeders\User;

use Infrastructure\Seed\Seeder;

class PermissionsSeeder extends Seeder
{
    protected string $table = 'permissions';

    public function run(): void
    {
        $this->db->table($this->table)->insert($this->getData());
    }

    protected function getData(): array
    {
        return [
            [
                'name' => 'create-network',
                'guard_name' => 'web',
                'created_at' => $this->now,
                'updated_at' => $this->now,
            ],
        ];
    }
}
