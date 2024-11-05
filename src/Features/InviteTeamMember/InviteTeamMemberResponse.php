<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\InviteTeamMember;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

final class InviteTeamMemberResponse implements InviteTeamMemberResponseInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function toResponse($request): RedirectResponse
    {
        return Redirect::back(303);
    }
}
