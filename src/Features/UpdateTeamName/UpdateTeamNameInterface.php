<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\UpdateTeamName;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;

interface UpdateTeamNameInterface
{
    public function __invoke(HasTeamsInterface $user, int $teamId, array $input): UpdateTeamNameResponseInterface;
}
