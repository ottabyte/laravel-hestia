<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\DeleteTeamMember;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;

interface DeleteTeamMemberInterface
{
    public function __invoke(HasTeamsInterface $user, int $teamId, int $teamMemberId): DeleteTeamMemberResponseInterface;
}
