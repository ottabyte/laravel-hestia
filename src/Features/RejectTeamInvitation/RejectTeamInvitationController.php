<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\RejectTeamInvitation;

use Illuminate\Http\Request;

final class RejectTeamInvitationController
{
    public function __invoke(Request $request, int $invitationId, RejectTeamInvitationInterface $rejectTeamInvitation): RejectTeamInvitationResponseInterface
    {
        return $rejectTeamInvitation($request->user(), $invitationId);
    }
}
