<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Chamado;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function carros() {
      return $this->belongsToMany('App\Carro');
    }

    public function chamados() {
      return $this->belongsToMany(Chamado::class);
    }

    // Aqui neste método, assume-se que o administrador tem id igual a 1. Logo, verificamos se o id do usuário logado é igual a 1 e caso positivo, retornamos true, fazendo assim com que o método before($user, $ability) interrompa as verificações de permissões da classe ChamadoPolicy.
    // PS: Este método é bem conceitual e será melhorado nas próximas aulas.
    public function eAdmin() {
      return $this->id == 1;
    }
}
