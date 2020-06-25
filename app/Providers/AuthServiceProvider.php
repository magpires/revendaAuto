<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Chamado;

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

        // Criando a regra para controlar quem pode ver um determinado chamado
        // O método define() receberá dois parâmetros, sendo o primeiro parâmetro o nome da segunda variável e o segundo parâmetro uma function. Esta function é uma função de rollback que recebe dois parâmetros. O primeiro parâmetro é o usuário logado e o segundo parâmetro é a model ao qual estamos trabalhando com a regra. Este método retorna true, false. Se retornar true, significa que o usuário tem acesso a permissão que ele está solicitando.

        // Em outras palavras, temos uma chamada que segue o exemplo:

        // Gate::define('nome-da-regra', function($user, Model $nomeDaModel) {});
        Gate::define('ver-chamado', function($user, Chamado $chamado) {
            return $user->id == $chamado->user_id;
        });
    }
}
