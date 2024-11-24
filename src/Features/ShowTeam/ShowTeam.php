<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\ShowTeam;

use BaseCodeOy\Hestia\Configuration\Eloquent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;

final class ShowTeam implements ShowTeamInterface
{
    public function __invoke(int $teamId): ShowTeamResponseInterface
    {
        $team = Eloquent::findTeam($teamId);

        Gate::authorize('view', $team);

        return App::make(ShowTeamResponseInterface::class, ['team' => $team]);
    }
}
