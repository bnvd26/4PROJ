<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('platform_administrator', function (User $user) {
            return $user->type === 'platform_administrator';
        });

        Gate::define('student', function (User $user) {
            return $user->type === 'student';
        });

        Gate::define('pedagogy_member', function (User $user) {
            return $user->type === 'pedagogy_member';
        });

        Gate::define('academic_direction', function (User $user) {
            return $user->type === 'academic_direction';
        });

    }
}
