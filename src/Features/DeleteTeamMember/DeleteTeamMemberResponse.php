<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\DeleteTeamMember;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

final class DeleteTeamMemberResponse implements DeleteTeamMemberResponseInterface
{
    public function __construct(
        private readonly HasTeamsInterface $user,
    ) {}

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function toResponse($request): RedirectResponse
    {
        if (Request::user()->id === $this->user->id) {
            return Redirect::to(Config::get('fortify.home'));
        }

        return Redirect::back(303);
    }
}
