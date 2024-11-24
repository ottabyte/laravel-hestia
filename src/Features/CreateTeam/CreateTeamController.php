<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\CreateTeam;

final class CreateTeamController
{
    public function __invoke(CreateTeamInterface $createTeam): CreateTeamResponseInterface
    {
        return $createTeam();
    }
}
