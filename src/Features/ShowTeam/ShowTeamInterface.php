<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\ShowTeam;

interface ShowTeamInterface
{
    public function __invoke(int $teamId): ShowTeamResponseInterface;
}
