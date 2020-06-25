<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    // É possível dizer ao Laravel como que queremos que ele crie nossa tabela lá no banco. Pra que ele não crie 'permissaos', eu informo a ele que eu quero que a tabela se chame 'permissoes', no plural na forma correta.

    // Basta usar: protected $table = 'nome_da_tabela_no_plural';
    protected $table = 'permissoes';
    
    protected $fillable = ['nome', 'descricao'];

    // Aqui nós retornamos todos os papeis de uma permissão
    public function papeis() {
        return $this->belongsToMany(Papel::class);
    }
}
