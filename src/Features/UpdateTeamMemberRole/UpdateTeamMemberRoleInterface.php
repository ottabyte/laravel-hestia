<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\UpdateTeamMemberRole;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;

interface UpdateTeamMemberRoleInterface
{
    public function __invoke(HasTeamsInterface $user, int $teamId, int $teamMemberId, string $role): UpdateTeamMemberRoleResponseInterface;
}
