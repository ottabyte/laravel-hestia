<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\SwitchTeam;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

final class SwitchTeamResponse implements SwitchTeamResponseInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function toResponse($request): RedirectResponse
    {
        return Redirect::to('/', 303);
    }
}
