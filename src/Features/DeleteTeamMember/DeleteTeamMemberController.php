<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Features\DeleteTeamMember;

use Illuminate\Http\Request;

final class DeleteTeamMemberController
{
    public function __invoke(Request $request, int $teamId, int $userId, DeleteTeamMemberInterface $deleteTeamMember): DeleteTeamMemberResponseInterface
    {
        return $deleteTeamMember($request->user(), $teamId, $userId);
    }
}
