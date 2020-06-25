<?php

namespace App\Policies;

use App\User;
use App\Chamado;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChamadoTestePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the chamado.
     *
     * @param  \App\User  $user
     * @param  \App\Chamado  $chamado
     * @return mixed
     */
    
    // Aqui nós implementamos a mesma lógica implementada no método verChamado
    // O método before($user, Chamado $chamado) também pode ser implementado nesta classe, garantindo assim que um administrador tenha todas as permissões da política em questão.
    public function before($user, $ability) {
        if($user->eAdmin()) {
            return true;
        }
    }

    // Também podemos usar o método before($user, $ability) para desautorizar um usuário em todas as regras, conforme exemplo abaixo
    // public function before($user, $ability) {
    //     if($user->eAdmin()) {
    //         return false;
    //     }
    // }


    public function view(User $user, Chamado $chamado)
    {
        return $user->id == $chamado->user_id;
    }

    /**
     * Determine whether the user can create chamados.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    
    // Todos podem criar chamados
    public function create(User $user)
    {
        return 1;
    }

    /**
     * Determine whether the user can update the chamado.
     *
     * @param  \App\User  $user
     * @param  \App\Chamado  $chamado
     * @return mixed
     */
    
    // Somente o dono do chamado pode atualizar o seu chamado!
    // O Adm consegue isso também, com o método before($user, $ability)
    public function update(User $user, Chamado $chamado)
    {
        return $user->id == $chamado->user_id;
    }

    /**
     * Determine whether the user can delete the chamado.
     *
     * @param  \App\User  $user
     * @param  \App\Chamado  $chamado
     * @return mixed
     */
    
    // Somente o dono do chamado pode deletar o seu chamado!
    // O Adm consegue isso também, com o método before($user, $ability)
    public function delete(User $user, Chamado $chamado)
    {
        return $user->id == $chamado->user_id;
    }
}
