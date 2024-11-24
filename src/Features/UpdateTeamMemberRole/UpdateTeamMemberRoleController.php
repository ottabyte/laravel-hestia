<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\UpdateTeamMemberRole;

use Illuminate\Http\Request;

final class UpdateTeamMemberRoleController
{
    public function __invoke(Request $request, int $teamId, int $userId, UpdateTeamMemberRoleInterface $updateTeamMemberRole): UpdateTeamMemberRoleResponseInterface
    {
        return $updateTeamMemberRole($request->user(), $teamId, $userId, $request->role);
    }
}
