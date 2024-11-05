<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\StoreTeam;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;

interface StoreTeamInterface
{
    public function __invoke(HasTeamsInterface $user, array $input): StoreTeamResponseInterface;
}
