<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Chamado;

class ChamadoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    // O método seguinte é um método executado sempre que uma política é chamada. Antes que qualquer regra de validação seja executada, o sistema irá verificar se o usuário logado é um aministrador. Caso positivo, ele não irá passar por nenhuma validação a mais.
    public function before($user, $ability) {
        if($user->eAdmin()) {
            return true;
        }
    }

    // Note que o método foi criado com a seguinte nomeclatura 'verChamado'. Isso acontece para que na hora em que a regra for chamada pelo nome 'ver-chamado', o Laravel consiga encontrar este método.
    public function verChamado($user, Chamado $chamado) {
        return $user->id == $chamado->user_id;
    }
}
