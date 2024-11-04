<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Events;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;
use Illuminate\Foundation\Events\Dispatchable;

final class AddingTeam
{
    use Dispatchable;

    public function __construct(public readonly HasTeamsInterface $owner) {}
}
