<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\StoreTeam;

use Illuminate\Http\Request;

final class StoreTeamController
{
    public function __invoke(Request $request, StoreTeamInterface $storeTeam): StoreTeamResponseInterface
    {
        return $storeTeam($request->user(), $request->all());
    }
}
