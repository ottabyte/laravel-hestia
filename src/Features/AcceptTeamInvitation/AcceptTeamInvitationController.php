<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\AcceptTeamInvitation;

final class AcceptTeamInvitationController
{
    public function __invoke(int $invitationId, AcceptTeamInvitationInterface $acceptTeamInvitation): AcceptTeamInvitationResponseInterface
    {
        return $acceptTeamInvitation($invitationId);
    }
}
