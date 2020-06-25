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
}
