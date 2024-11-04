<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\AcceptTeamInvitation;

interface AcceptTeamInvitationInterface
{
    public function __invoke(int $invitationId): AcceptTeamInvitationResponseInterface;
}
