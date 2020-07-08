<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    // É possível dizer ao Laravel como que queremos que ele crie nossa tabela lá no banco. Pra que ele não crie 'papels', eu informo a ele que eu quero que a tabela se chame 'papeis', no plural na forma correta.

    // Basta usar: protected $table = 'nome_da_tabela_no_plural';
    protected $table = 'papeis';
    
    protected $fillable = ['nome', 'descricao'];

    // Aqui nós retornamos todos os usuários de um papel
    public function users() {
        return $this->belongsToMany(User::class);
    }

    // Aqui nós retornamos todos as permissoes de um papel
    public function permissoes() {
        return $this->belongsToMany(Permissao::class);
    }

    // Métodos que adiciona uma permissão a um usuário
  public function adicionaPermissao($permissao) {
    // Verificamos se a permissão não é uma string, em casos em que a permissão não é passado como um objeto
    if(is_string($permissao)) {
        // Caso seja string, procuramos pela permissão tal como o seu nome informado
        $permissao = Permissao::where('nome', $permissao)->find();
    }

    // Depois vamos verificar se a permissão já não existe para o papel
    if ($this->existePermissao($permissao)) {
      return;
    }

    return $this->permissoes()->attach($permissao);
  }

  public function existePermissao($permissao) {
    // Verificamos se a permissão não é uma string, em casos em que a permissão não é passado como um objeto
    if(is_string($permissao)) {
        // Caso seja string, procuramos pela permissão tal como o seu nome informado
        $permissao = Permissao::where('nome', $permissao)->firstOrFail();
    }

    // Retornamos verdadeiro, caso o usuário já tenha esta permissao, e falso, caso não tenha!
    return (boolean) $this->permissoes()->find($permissao->id);
  }
  // Fim dos métodos que adiciona a permissão ao usuário

  // Método para remover permissão do usuário
  public function removePermissao($permissao) {
    // Verificamos se a permissão não é uma string, em casos em que a permissão não é passado como um objeto
    if(is_string($permissao)) {
        // Caso seja string, procuramos pela permissão tal como o seu nome informado
        $permissao = Permissao::where('nome', $permissao)->firstOrFail();
    }

    return $this->permissoes()->detach($permissao);
  }
  // Fim do método para remover permissão do usuário
}
