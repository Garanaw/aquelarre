<?php

declare(strict_types=1);

namespace Database\Seeders\Permission;

use App\Permission\Domain\Enum\Permission;
use Garanaw\SeedableMigrations\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): bool
    {
        return $this->db->table('permissions')->insert($this->getData());
    }

    protected function getData(): array
    {
        $now = now();
        $callback = static fn (array $permission) => [
            ...$permission,
            'guard_name' => 'web',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        return array_map($callback, [
            [
                'name' => Permission::ADMIN_DASHBOARD_VIEW->value,
                'display_name' => 'View Admin Dashboard',
            ],
            [
                'name' => Permission::USER_DASHBOARD_VIEW->value,
                'display_name' => 'View User Dashboard',
            ],
            [
                'name' => Permission::USERS_MANAGE->value,
                'display_name' => 'Manage Users',
            ],
            [
                'name' => Permission::ROLES_MANAGE->value,
                'display_name' => 'Manage Roles',
            ],
            [
                'name' => Permission::PERMISSIONS_MANAGE->value,
                'display_name' => 'Manage Permissions',
            ],
            [
                'name' => Permission::SPELLS_VIEW->value,
                'display_name' => 'View Spells',
            ],
            [
                'name' => Permission::SPELLS_CREATE->value,
                'display_name' => 'Create Spells',
            ],
            [
                'name' => Permission::SPELLS_EDIT->value,
                'display_name' => 'Edit Spells',
            ],
            [
                'name' => Permission::SPELLS_DELETE->value,
                'display_name' => 'Delete Spells',
            ],
            [
                'name' => Permission::RITUALS_VIEW->value,
                'display_name' => 'View Rituals',
            ],
            [
                'name' => Permission::RITUALS_CREATE->value,
                'display_name' => 'Create Rituals',
            ],
            [
                'name' => Permission::RITUALS_EDIT->value,
                'display_name' => 'Edit Rituals',
            ],
            [
                'name' => Permission::RITUALS_DELETE->value,
                'display_name' => 'Delete Rituals',
            ],
            [
                'name' => Permission::PROFESSIONS_VIEW->value,
                'display_name' => 'View Professions',
            ],
            [
                'name' => Permission::PROFESSIONS_CREATE->value,
                'display_name' => 'Create Professions',
            ],
            [
                'name' => Permission::PROFESSIONS_EDIT->value,
                'display_name' => 'Edit Professions',
            ],
            [
                'name' => Permission::PROFESSIONS_DELETE->value,
                'display_name' => 'Delete Professions',
            ],
            [
                'name' => Permission::ITEMS_VIEW->value,
                'display_name' => 'View Items',
            ],
            [
                'name' => Permission::ITEMS_CREATE->value,
                'display_name' => 'Create Items',
            ],
            [
                'name' => Permission::ITEMS_EDIT->value,
                'display_name' => 'Edit Items',
            ],
            [
                'name' => Permission::ITEMS_DELETE->value,
                'display_name' => 'Delete Items',
            ],
            [
                'name' => Permission::HORIZON_VIEW->value,
                'display_name' => 'View Horizon',
            ],
            [
                'name' => Permission::MODULES_VIEW->value,
                'display_name' => 'View Modules',
            ],
            [
                'name' => Permission::MODULES_CREATE->value,
                'display_name' => 'Create Modules',
            ],
            [
                'name' => Permission::MODULES_EDIT->value,
                'display_name' => 'Edit Modules',
            ],
            [
                'name' => Permission::MODULES_DELETE->value,
                'display_name' => 'Delete Modules',
            ],
            [
                'name' => Permission::MODULES_PUBLISH->value,
                'display_name' => 'Publish Modules',
            ],
            [
                'name' => Permission::MODULES_UNPUBLISH->value,
                'display_name' => 'Unpublish Modules',
            ],
        ]);
    }
}
