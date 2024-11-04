<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\UpdateTeamMemberRole;

use Illuminate\Http\Request;

final class UpdateTeamMemberRoleController
{
    public function __invoke(Request $request, int $teamId, int $userId, UpdateTeamMemberRoleInterface $updateTeamMemberRole): UpdateTeamMemberRoleResponseInterface
    {
        return $updateTeamMemberRole($request->user(), $teamId, $userId, $request->role);
    }
}
