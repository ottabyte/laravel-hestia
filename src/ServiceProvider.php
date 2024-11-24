<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia;

use BaseCodeOy\Hestia\Features\AcceptTeamInvitation\AcceptTeamInvitation;
use BaseCodeOy\Hestia\Features\AcceptTeamInvitation\AcceptTeamInvitationInterface;
use BaseCodeOy\Hestia\Features\AcceptTeamInvitation\AcceptTeamInvitationResponse;
use BaseCodeOy\Hestia\Features\AcceptTeamInvitation\AcceptTeamInvitationResponseInterface;
use BaseCodeOy\Hestia\Features\CreateTeam\CreateTeam;
use BaseCodeOy\Hestia\Features\CreateTeam\CreateTeamInterface;
use BaseCodeOy\Hestia\Features\CreateTeam\CreateTeamResponse;
use BaseCodeOy\Hestia\Features\CreateTeam\CreateTeamResponseInterface;
use BaseCodeOy\Hestia\Features\DeleteTeam\DeleteTeam;
use BaseCodeOy\Hestia\Features\DeleteTeam\DeleteTeamInterface;
use BaseCodeOy\Hestia\Features\DeleteTeam\DeleteTeamResponse;
use BaseCodeOy\Hestia\Features\DeleteTeam\DeleteTeamResponseInterface;
use BaseCodeOy\Hestia\Features\DeleteTeamMember\DeleteTeamMember;
use BaseCodeOy\Hestia\Features\DeleteTeamMember\DeleteTeamMemberInterface;
use BaseCodeOy\Hestia\Features\DeleteTeamMember\DeleteTeamMemberResponse;
use BaseCodeOy\Hestia\Features\DeleteTeamMember\DeleteTeamMemberResponseInterface;
use BaseCodeOy\Hestia\Features\InviteTeamMember\InviteTeamMember;
use BaseCodeOy\Hestia\Features\InviteTeamMember\InviteTeamMemberInterface;
use BaseCodeOy\Hestia\Features\InviteTeamMember\InviteTeamMemberResponse;
use BaseCodeOy\Hestia\Features\InviteTeamMember\InviteTeamMemberResponseInterface;
use BaseCodeOy\Hestia\Features\RejectTeamInvitation\RejectTeamInvitation;
use BaseCodeOy\Hestia\Features\RejectTeamInvitation\RejectTeamInvitationInterface;
use BaseCodeOy\Hestia\Features\RejectTeamInvitation\RejectTeamInvitationResponse;
use BaseCodeOy\Hestia\Features\RejectTeamInvitation\RejectTeamInvitationResponseInterface;
use BaseCodeOy\Hestia\Features\ShowTeam\ShowTeam;
use BaseCodeOy\Hestia\Features\ShowTeam\ShowTeamInterface;
use BaseCodeOy\Hestia\Features\ShowTeam\ShowTeamResponse;
use BaseCodeOy\Hestia\Features\ShowTeam\ShowTeamResponseInterface;
use BaseCodeOy\Hestia\Features\StoreTeam\StoreTeam;
use BaseCodeOy\Hestia\Features\StoreTeam\StoreTeamInterface;
use BaseCodeOy\Hestia\Features\StoreTeam\StoreTeamResponse;
use BaseCodeOy\Hestia\Features\StoreTeam\StoreTeamResponseInterface;
use BaseCodeOy\Hestia\Features\SwitchTeam\SwitchTeam;
use BaseCodeOy\Hestia\Features\SwitchTeam\SwitchTeamInterface;
use BaseCodeOy\Hestia\Features\SwitchTeam\SwitchTeamResponse;
use BaseCodeOy\Hestia\Features\SwitchTeam\SwitchTeamResponseInterface;
use BaseCodeOy\Hestia\Features\UpdateTeamMemberRole\UpdateTeamMemberRole;
use BaseCodeOy\Hestia\Features\UpdateTeamMemberRole\UpdateTeamMemberRoleInterface;
use BaseCodeOy\Hestia\Features\UpdateTeamMemberRole\UpdateTeamMemberRoleResponse;
use BaseCodeOy\Hestia\Features\UpdateTeamMemberRole\UpdateTeamMemberRoleResponseInterface;
use BaseCodeOy\Hestia\Features\UpdateTeamName\UpdateTeamName;
use BaseCodeOy\Hestia\Features\UpdateTeamName\UpdateTeamNameInterface;
use BaseCodeOy\Hestia\Features\UpdateTeamName\UpdateTeamNameResponse;
use BaseCodeOy\Hestia\Features\UpdateTeamName\UpdateTeamNameResponseInterface;
use BaseCodeOy\Hestia\Http\Middleware\SetPermissionsTeamId;
use BaseCodeOy\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Contracts\Http\Kernel as KernelContract;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->registerFeatures();

        $this->registerRoutes();

        $this->registerMiddleware();
    }

    private function registerFeatures(): void
    {
        $this->app->bind(AcceptTeamInvitationInterface::class, AcceptTeamInvitation::class);
        $this->app->bind(AcceptTeamInvitationResponseInterface::class, AcceptTeamInvitationResponse::class);

        $this->app->bind(CreateTeamInterface::class, CreateTeam::class);
        $this->app->bind(CreateTeamResponseInterface::class, CreateTeamResponse::class);

        $this->app->bind(DeleteTeamInterface::class, DeleteTeam::class);
        $this->app->bind(DeleteTeamResponseInterface::class, DeleteTeamResponse::class);

        $this->app->bind(DeleteTeamMemberInterface::class, DeleteTeamMember::class);
        $this->app->bind(DeleteTeamMemberResponseInterface::class, DeleteTeamMemberResponse::class);

        $this->app->bind(InviteTeamMemberInterface::class, InviteTeamMember::class);
        $this->app->bind(InviteTeamMemberResponseInterface::class, InviteTeamMemberResponse::class);

        $this->app->bind(RejectTeamInvitationInterface::class, RejectTeamInvitation::class);
        $this->app->bind(RejectTeamInvitationResponseInterface::class, RejectTeamInvitationResponse::class);

        $this->app->bind(ShowTeamInterface::class, ShowTeam::class);
        $this->app->bind(ShowTeamResponseInterface::class, ShowTeamResponse::class);

        $this->app->bind(StoreTeamInterface::class, StoreTeam::class);
        $this->app->bind(StoreTeamResponseInterface::class, StoreTeamResponse::class);

        $this->app->bind(SwitchTeamInterface::class, SwitchTeam::class);
        $this->app->bind(SwitchTeamResponseInterface::class, SwitchTeamResponse::class);

        $this->app->bind(UpdateTeamMemberRoleInterface::class, UpdateTeamMemberRole::class);
        $this->app->bind(UpdateTeamMemberRoleResponseInterface::class, UpdateTeamMemberRoleResponse::class);

        $this->app->bind(UpdateTeamNameInterface::class, UpdateTeamName::class);
        $this->app->bind(UpdateTeamNameResponseInterface::class, UpdateTeamNameResponse::class);
    }

    private function registerRoutes(): void
    {
        foreach (Config::get('hestia.routes') as $route) {
            $pendingRoute = Route::match($route['method'], $route['path'], $route['action']);

            if (\array_key_exists('middleware', $route)) {
                $pendingRoute->middleware($route['middleware']);
            }

            $pendingRoute->name($route['name']);
        }
    }

    private function registerMiddleware(): void
    {
        /** @var Kernel $kernel */
        $kernel = $this->app->make(KernelContract::class);
        $kernel->appendMiddlewareToGroup('web', SetPermissionsTeamId::class);
        $kernel->appendToMiddlewarePriority(SetPermissionsTeamId::class);
    }
}
