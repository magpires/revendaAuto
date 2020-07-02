<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Chamado;
use App\Papel;

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

  // Aqui nós retornamos todos os papeis de um usuário
  public function papeis() {
    return $this->belongsToMany(Papel::class);
  }

  // Métodos que adiciona o papel ao usuário
  public function adicionaPapel($papel) {
    // Verificamos se o papel não é uma string, em casos em que o papel não é passado como um objeto
    if(is_string($papel)) {
        // Caso seja string, procuramos pelo papel tal como o seu nome informado
        $papel = Papel::where('nome', $papel)->find();
    }

    // Depois vamos verificar se o papel já não existe para o usuário
    if ($this->existePapel($papel)) {
      return;
    }

    return $this->papeis()->attach($papel);
  }

  public function existePapel($papel) {
    // Verificamos se o papel não é uma string, em casos em que o papel não é passado como um objeto
    if(is_string($papel)) {
        // Caso seja string, procuramos pelo papel tal como o seu nome informado
        $papel = Papel::where('nome', $papel)->firstOrFail();
    }

    // Retornamos verdadeiro, caso o usuário já tenha este papel, e falso, caso não tenha!
    return (boolean) $this->papeis()->find($papel->id);
  }
  // Fim dos métodos que adiciona o papel ao usuário

  // Método para remover papel do usuário
  public function removePapel($papel) {
    // Verificamos se o papel não é uma string, em casos em que o papel não é passado como um objeto
    if(is_string($papel)) {
        // Caso seja string, procuramos pelo papel tal como o seu nome informado
        $papel = Papel::where('nome', $papel)->firstOrFail();
    }

    return $this->papeis()->detach($papel);
  }// Fim do método para remover papel do usuário
}
