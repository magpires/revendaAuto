<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Chamado extends Model
{
    protected $fillable = ['user_id', 'titulo', 'descricao', 'status'];

    // Retorna o usuário dono do chamado
    public function user() {
        return $this->belongsTo(User::class);
    }
}
