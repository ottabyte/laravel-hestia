<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Events;

use BaseCodeOy\Hestia\Models\Team;
use Illuminate\Foundation\Events\Dispatchable;

final class TeamUpdated
{
    use Dispatchable;

    public function __construct(public readonly Team $team) {}
}
