<?php

declare(strict_types=1);

namespace App\Permission\Domain\Enum;

enum Permission: string
{
    case ADMIN_DASHBOARD_VIEW = 'admin.dashboard.view';
    case USER_DASHBOARD_VIEW = 'user.dashboard.view';

    case USERS_MANAGE = 'users.manage';
    case ROLES_MANAGE = 'roles.manage';
    case PERMISSIONS_MANAGE = 'permissions.manage';

    case SPELLS_VIEW = 'spells.view';
    case SPELLS_CREATE = 'spells.create';
    case SPELLS_EDIT = 'spells.edit';
    case SPELLS_DELETE = 'spells.delete';

    case PROFESSIONS_VIEW = 'professions.view';
    case PROFESSIONS_CREATE = 'professions.create';
    case PROFESSIONS_EDIT = 'professions.edit';
    case PROFESSIONS_DELETE = 'professions.delete';

    case RITUALS_VIEW = 'rituals.view';
    case RITUALS_CREATE = 'rituals.create';
    case RITUALS_EDIT = 'rituals.edit';
    case RITUALS_DELETE = 'rituals.delete';

    case ITEMS_VIEW = 'items.view';
    case ITEMS_CREATE = 'items.create';
    case ITEMS_EDIT = 'items.edit';
    case ITEMS_DELETE = 'items.delete';

    case MODULES_VIEW = 'modules.view';
    case MODULES_CREATE = 'modules.create';
    case MODULES_EDIT = 'modules.edit';
    case MODULES_DELETE = 'modules.delete';
    case MODULES_PUBLISH = 'modules.publish';
    case MODULES_UNPUBLISH = 'modules.unpublish';

    case HORIZON_VIEW = 'horizon.view';
}
