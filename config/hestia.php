<?php

declare(strict_types=1);

use BaseCodeOy\Hestia\Features\AcceptTeamInvitation\AcceptTeamInvitationController;
use BaseCodeOy\Hestia\Features\CreateTeam\CreateTeamController;
use BaseCodeOy\Hestia\Features\DeleteTeam\DeleteTeamController;
use BaseCodeOy\Hestia\Features\DeleteTeamMember\DeleteTeamMemberController;
use BaseCodeOy\Hestia\Features\InviteTeamMember\InviteTeamMemberController;
use BaseCodeOy\Hestia\Features\RejectTeamInvitation\RejectTeamInvitationController;
use BaseCodeOy\Hestia\Features\ShowTeam\ShowTeamController;
use BaseCodeOy\Hestia\Features\StoreTeam\StoreTeamController;
use BaseCodeOy\Hestia\Features\SwitchTeam\SwitchTeamController;
use BaseCodeOy\Hestia\Features\UpdateTeamMemberRole\UpdateTeamMemberRoleController;
use BaseCodeOy\Hestia\Features\UpdateTeamName\UpdateTeamNameController;
use BaseCodeOy\Hestia\Models\Membership;
use BaseCodeOy\Hestia\Models\Team;
use BaseCodeOy\Hestia\Models\TeamInvitation;

return [
    'models' => [
        'user' => 'App\\Models\\User',
        'team' => Team::class,
        'membership' => Membership::class,
        'team_invitation' => TeamInvitation::class,
    ],
    'routes' => [
        [
            'method' => 'get',
            'name' => 'teams.create',
            'path' => '/teams/create',
            'action' => CreateTeamController::class,
        ],
        [
            'method' => 'post',
            'name' => 'teams.store',
            'path' => '/teams',
            'action' => StoreTeamController::class,
        ],
        [
            'method' => 'get',
            'name' => 'teams.show',
            'path' => '/teams/{team}',
            'action' => ShowTeamController::class,
        ],
        [
            'method' => 'put',
            'name' => 'teams.update',
            'path' => '/teams/{team}',
            'action' => UpdateTeamNameController::class,
        ],
        [
            'method' => 'delete',
            'name' => 'teams.destroy',
            'path' => '/teams/{team}',
            'action' => DeleteTeamController::class,
        ],
        [
            'method' => 'put',
            'name' => 'current-team.update',
            'path' => '/current-team',
            'action' => SwitchTeamController::class,
        ],
        [
            'method' => 'post',
            'name' => 'team-members.store',
            'path' => '/teams/{team}/members',
            'action' => InviteTeamMemberController::class,
        ],
        [
            'method' => 'put',
            'name' => 'team-members.update',
            'path' => '/teams/{team}/members/{user}',
            'action' => UpdateTeamMemberRoleController::class,
        ],
        [
            'method' => 'delete',
            'name' => 'team-members.destroy',
            'path' => '/teams/{team}/members/{user}',
            'action' => DeleteTeamMemberController::class,
        ],
        [
            'method' => 'get',
            'name' => 'team-invitations.accept',
            'path' => '/team-invitations/{invitation}',
            'action' => AcceptTeamInvitationController::class,
            'middleware' => ['signed'],
        ],
        [
            'method' => 'delete',
            'name' => 'team-invitations.destroy',
            'path' => '/team-invitations/{invitation}',
            'action' => RejectTeamInvitationController::class,
        ],
    ],
];
