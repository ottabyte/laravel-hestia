<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\RejectTeamInvitation;

use Illuminate\Http\Request;

final class RejectTeamInvitationController
{
    public function __invoke(Request $request, int $invitationId, RejectTeamInvitationInterface $rejectTeamInvitation): RejectTeamInvitationResponseInterface
    {
        return $rejectTeamInvitation($request->user(), $invitationId);
    }
}
