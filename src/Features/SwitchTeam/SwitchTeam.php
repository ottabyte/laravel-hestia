<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\SwitchTeam;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;
use BaseCodeOy\Hestia\Configuration\Eloquent;
use Illuminate\Support\Facades\App;

final class SwitchTeam implements SwitchTeamInterface
{
    public function __invoke(HasTeamsInterface $user, int $teamId): SwitchTeamResponseInterface
    {
        $team = Eloquent::findTeam($teamId);

        abort_unless(403, $user->switchTeam($team));

        return App::make(SwitchTeamResponseInterface::class);
    }
}
