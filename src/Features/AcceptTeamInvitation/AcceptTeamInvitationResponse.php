<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\AcceptTeamInvitation;

use BaseCodeOy\Hestia\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

final class AcceptTeamInvitationResponse implements AcceptTeamInvitationResponseInterface
{
    public function __construct(
        private readonly Team $team,
    ) {}

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function toResponse($request): RedirectResponse
    {
        return Redirect::to('/')->banner(
            __('Great! You have accepted the invitation to join the :team team.', ['team' => $this->team->name]),
        );
    }
}
