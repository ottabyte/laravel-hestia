<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\StoreTeam;

use BaseCodeOy\Hestia\Models\Team;

final class StoreTeamResponse implements StoreTeamResponseInterface
{
    public function __construct(
        private readonly Team $team,
    ) {}

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function toResponse($request): Team
    {
        return $this->team;
    }
}
