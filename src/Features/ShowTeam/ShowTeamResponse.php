<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\ShowTeam;

use BaseCodeOy\Hestia\Authorization\Authorization;
use BaseCodeOy\Hestia\Models\Team;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

final class ShowTeamResponse implements ShowTeamResponseInterface
{
    public function __construct(
        private readonly Team $team,
    ) {}

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function toResponse($request): Response
    {
        return Inertia::render('Teams/Show', [
            'team' => $this->team->load('owner', 'users', 'teamInvitations'),
            'availableRoles' => \array_values(Authorization::$roles),
            'availablePermissions' => Authorization::$permissions,
            'defaultPermissions' => Authorization::$defaultPermissions,
            'permissions' => [
                'canAddTeamMembers' => Gate::check('addTeamMember', $this->team),
                'canDeleteTeam' => Gate::check('delete', $this->team),
                'canRemoveTeamMembers' => Gate::check('removeTeamMember', $this->team),
                'canUpdateTeam' => Gate::check('update', $this->team),
                'canUpdateTeamMembers' => Gate::check('updateTeamMember', $this->team),
            ],
        ]);
    }
}
