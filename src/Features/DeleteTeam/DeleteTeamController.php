<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\DeleteTeam;

use Illuminate\Http\Request;

final class DeleteTeamController
{
    public function __invoke(Request $request, int $teamId, DeleteTeamInterface $deleteTeam): DeleteTeamResponseInterface
    {
        return $deleteTeam($request->user(), $teamId);
    }
}
