<?php

declare(strict_types=1);

namespace Database\Seeders\Core\User;

use Aquelarre\Core\Framework\Infrastructure\Seed\Seeder;

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
                'name' => 'create-character',
                'guard_name' => 'web',
                'created_at' => $this->now,
                'updated_at' => $this->now,
            ],
        ];
    }
}
