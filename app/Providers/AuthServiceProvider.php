<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Car;
use App\Models\Owner;
use App\Models\ShortCode;
use App\Policies\CarPolicy;
use App\Policies\OwnerPolicy;
use App\Policies\ShortCodePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Car::class => CarPolicy::class,
        Owner::class => OwnerPolicy::class,
        ShortCode::class => ShortCodePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit', function (User $user){
            return ($user->type=='admin');
        });
    }
}
