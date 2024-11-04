<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\SwitchTeam;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;

interface SwitchTeamInterface
{
    public function __invoke(HasTeamsInterface $user, int $teamId): SwitchTeamResponseInterface;
}
