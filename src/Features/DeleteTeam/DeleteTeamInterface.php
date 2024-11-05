<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\DeleteTeam;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;

interface DeleteTeamInterface
{
    public function __invoke(HasTeamsInterface $user, int $teamId): DeleteTeamResponseInterface;
}
