<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\StoreTeam;

use Illuminate\Http\Request;

final class StoreTeamController
{
    public function __invoke(Request $request, StoreTeamInterface $storeTeam): StoreTeamResponseInterface
    {
        return $storeTeam($request->user(), $request->all());
    }
}
