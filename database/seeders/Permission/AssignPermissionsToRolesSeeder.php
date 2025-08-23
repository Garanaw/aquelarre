<?php

declare(strict_types=1);

namespace Database\Seeders\Permission;

use App\Permission\Infrastructure\Models\Permission;
use App\Permission\Infrastructure\Models\Role;
use Garanaw\SeedableMigrations\Seeder;

class AssignPermissionsToRolesSeeder extends Seeder
{
    public function run(): bool
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return $this->db->transaction(function () use ($roles, $permissions) {
            foreach ($this->getData() as $role => $permissionsForRole) {
                $targetRole = $roles->firstWhere('name', '=', $role);

                if ($permissionsForRole === ['*']) {
                    $targetRole->syncPermissions($permissions);
                    continue;
                }

                $targetRole->syncPermissions($permissionsForRole);
            }

            return true;
        });
    }

    protected function getData(): array
    {
        return [
            'admin' => ['*'], // full access
            'moderator' => ['*'], // full access
            'editor' => [ // access to all content management except deleting, and managing users, roles and permissions
                'spells.view',
                'spells.create',
                'spells.edit',
                'professions.view',
                'professions.create',
                'professions.edit',
                'rituals.view',
                'rituals.create',
                'rituals.edit',
                'items.view',
                'items.create',
                'items.edit',
                'modules.view',
                'modules.create',
                'modules.edit',
            ],
            'player' => [ // only read access to content
                'user.dashboard.view',
                'spells.view',
                'professions.view',
                'rituals.view',
                'items.view',
                'modules.view',
            ],
        ];
    }
}
