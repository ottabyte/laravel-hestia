<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\SwitchTeam;

use Illuminate\Http\Request;

final class SwitchTeamController
{
    public function __invoke(Request $request, SwitchTeamInterface $switchTeam): SwitchTeamResponseInterface
    {
        return $switchTeam($request->user(), $request->team_id);
    }
}
