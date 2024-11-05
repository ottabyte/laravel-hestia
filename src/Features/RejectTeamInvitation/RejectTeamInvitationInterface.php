<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\RejectTeamInvitation;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;

interface RejectTeamInvitationInterface
{
    public function __invoke(HasTeamsInterface $user, int $invitationId): RejectTeamInvitationResponseInterface;
}
