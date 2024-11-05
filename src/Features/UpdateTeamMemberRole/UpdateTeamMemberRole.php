<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\UpdateTeamMemberRole;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;
use BaseCodeOy\Hestia\Configuration\Eloquent;
use BaseCodeOy\Hestia\Events\TeamMemberUpdated;
use BaseCodeOy\Hestia\Rules\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

final class UpdateTeamMemberRole implements UpdateTeamMemberRoleInterface
{
    public function __invoke(HasTeamsInterface $user, int $teamId, int $teamMemberId, string $role): UpdateTeamMemberRoleResponseInterface
    {
        $team = Eloquent::findTeam($teamId);

        Gate::forUser($user)->authorize('updateTeamMember', $team);

        Validator::make([
            'role' => $role,
        ], [
            'role' => ['required', 'string', new Role()],
        ])->validate();

        $team->users()->updateExistingPivot($teamMemberId, [
            'role' => $role,
        ]);

        TeamMemberUpdated::dispatch($team->fresh(), Eloquent::findUser($teamMemberId));

        return App::make(UpdateTeamMemberRoleResponseInterface::class);
    }
}
