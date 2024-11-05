<?php

declare(strict_types=1);

namespace BaseCodeOy\Hestia\Features\CreateTeam;

interface CreateTeamInterface
{
    public function __invoke(): CreateTeamResponseInterface;
}
