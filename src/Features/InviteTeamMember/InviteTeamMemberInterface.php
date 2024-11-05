<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\InviteTeamMember;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;

interface InviteTeamMemberInterface
{
    public function __invoke(HasTeamsInterface $user, int $teamId, string $email, ?string $role = null): InviteTeamMemberResponseInterface;
}
