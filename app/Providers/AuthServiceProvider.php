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
    
    // Para uma melhor organização, é costumeiro que criemos políticas para um grupo de regras. Existem dois comandos para se criar uma política.
    
    // 1. php artisan make:policy NomeDaPolicy

    // O segundo comando para se criar uma policy recebe, além do nome da policy, o nome da model a qual queremos assegurar esta policy.
    // Isso nos garante que ele crie uma policy configurada com os principais métodos já inclusos e com os devidos uses das classes que vamos trabalhar
    // 2. php artisan make:policy NomeDaPolicy --model=NomeDaModel

    protected $policies = [
        // O exemplo abaixo é de como nós registramos a policy que acabamos de criar
        // 'App\Model' => 'App\Policies\ModelPolicy',

        // 'App\Chamado' => 'App\Policies\ChamadoPolicy',
        
        // Registrando a classe criada com o segundo comando do php artisan
        'App\Chamado' => 'App\Policies\ChamadoTestePolicy',
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
        
        // Gate::define('ver-chamado', function($user, Chamado $chamado) {
        //     return $user->id == $chamado->user_id;
        // });

        // Como criamos uma policy para as regras de chamado, não se faz necessário fazer a regra no método boot
    }
}
