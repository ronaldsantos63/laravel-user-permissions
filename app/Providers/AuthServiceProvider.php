<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Executa essa regra antes de qualquer outra
        // Se return true vai liberar independente das outras regras
        // Se return false vai bloquear o acesso independente das outras regras
        // Tomar cuidado com uso desse método
        Gate::before(function($user){
            // Se não for admin eu não posso retornar falso pois ira bloquear o acesso a qualquer usuário
            // Se for admin será concedido acesso total e será ignorado as outras regras
            if ($user->role == User::ROLE_ADMIN){
                return true;
            }
        });

        Gate::define('is-admin', function ($user){
            return $user->role == User::ROLE_ADMIN;
        });

        Gate::define('update-post', function ($user, $post){
            return $post->user_id == $user->id; // verifica se o usuário do post é o mesmo do autenticado
        });
    }
}
