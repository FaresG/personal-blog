<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Log;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Policies\LogPolicy;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('show-admin-dashboard', function (User $user) {
            return $user->role_id == Role::ADMINISTRATOR;
        });
    }
}
