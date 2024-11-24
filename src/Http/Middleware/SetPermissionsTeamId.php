<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Http\Middleware;

use Illuminate\Http\Request;
use Spatie\Permission\PermissionRegistrar;

final readonly class SetPermissionsTeamId
{
    public function __construct(
        private PermissionRegistrar $permissionRegistrar,
    ) {}

    public function handle(Request $request, \Closure $next)
    {
        $user = $request->user();

        if ($user?->current_team_id !== null) {
            $this->permissionRegistrar->setPermissionsTeamId($user->current_team_id);
        }

        return $next($request);
    }
}
