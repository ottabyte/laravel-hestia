<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\CreateTeam;

use BaseCodeOy\Hestia\Configuration\Eloquent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;

final class CreateTeam implements CreateTeamInterface
{
    public function __invoke(): CreateTeamResponseInterface
    {
        Gate::authorize('create', Eloquent::teamModel());

        return App::resolve(CreateTeamResponseInterface::class);
    }
}
