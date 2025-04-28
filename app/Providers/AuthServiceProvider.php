<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Cliente;
use App\Models\User;
use App\Policies\ClientePolicy;
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
        Cliente::class => ClientePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function ( User $user, $ability) {
            if(!$user->isAdmin()){
                if($user->habilidades()->contains($ability)){
                    return true;
                }
                return false;
            }
            else{
                return true;
            }

        });
    }
}
