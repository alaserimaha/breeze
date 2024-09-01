<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    protected function gate(): void
    {
        $allowedEmail = [
            'hsaied@kku.edu.sa',
        ];

        Gate::define('viewHorizon', function ($user = null) use ($allowedEmail) {
            if (!App::isProduction()) {
                return true;
            }
            // check if user has super admin role
            if ($user->hasRole(Role::SUPER_ADMIN) || in_array($user->email, $allowedEmail)) {
                return true;
            }
        });
    }
    protected function authorization()
    {
        Horizon::auth(function () {
            return true;
        });
    }
}
