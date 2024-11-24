<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Configuration;

use BaseCodeOy\Hestia\Concerns\HasTeamsInterface;
use BaseCodeOy\Hestia\Models\Team;
use BaseCodeOy\Hestia\Models\TeamInvitation;
use Illuminate\Support\Facades\Config;

final class Eloquent
{
    public static function findUser(int $id): HasTeamsInterface
    {
        $modelClass = self::userModel();

        return $modelClass::where('id', $id)->firstOrFail();
    }

    public static function findUserByEmail(string $email): HasTeamsInterface
    {
        $modelClass = self::userModel();

        return $modelClass::where('email', $email)->firstOrFail();
    }

    public static function findTeam(int $id): Team
    {
        $modelClass = self::teamModel();

        return $modelClass::findOrFail($id);
    }

    public static function findTeamInvitation(int $id): TeamInvitation
    {
        $modelClass = self::teamInvitationModel();

        return $modelClass::whereKey($id)->firstOrFail();
    }

    public static function userModel(): string
    {
        $model = Config::get('hestia.models.user');

        if ($model === null) {
            throw new \RuntimeException('Failed to resolve user model.');
        }

        return $model;
    }

    public static function teamModel(): string
    {
        $model = Config::get('hestia.models.team');

        if ($model === null) {
            throw new \RuntimeException('Failed to resolve team model.');
        }

        return $model;
    }

    public static function membershipModel(): string
    {
        $model = Config::get('hestia.models.membership');

        if ($model === null) {
            throw new \RuntimeException('Failed to resolve membership model.');
        }

        return $model;
    }

    public static function teamInvitationModel(): string
    {
        $model = Config::get('hestia.models.team_invitation');

        if ($model === null) {
            throw new \RuntimeException('Failed to resolve team invitation model.');
        }

        return $model;
    }
}
