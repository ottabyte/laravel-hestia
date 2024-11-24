<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Events;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;
use Illuminate\Foundation\Events\Dispatchable;

final class AddingTeam
{
    use Dispatchable;

    public function __construct(
        public readonly HasTeamsInterface $owner,
    ) {}
}
