<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\UpdateTeamName;

use Illuminate\Http\Request;

final class UpdateTeamNameController
{
    public function __invoke(Request $request, int $teamId, UpdateTeamNameInterface $updateTeamName): UpdateTeamNameResponseInterface
    {
        return $updateTeamName($request->user(), $teamId, $request->all());
    }
}
