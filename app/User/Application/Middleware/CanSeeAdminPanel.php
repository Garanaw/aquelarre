<?php

declare(strict_types=1);

namespace App\User\Application\Middleware;

use App\Permission\Domain\Enum\Permission;
use Illuminate\Http\Request;

class CanSeeAdminPanel
{
    public function handle(Request $request, \Closure $next): mixed
    {
        if ($request->user()?->can(Permission::ADMIN_DASHBOARD_VIEW)) {
            return $next($request);
        }

        abort(403);
    }
}
