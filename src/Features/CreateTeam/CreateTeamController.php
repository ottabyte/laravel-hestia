<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\CreateTeam;

final class CreateTeamController
{
    public function __invoke(CreateTeamInterface $createTeam): CreateTeamResponseInterface
    {
        return $createTeam();
    }
}
