<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // Podemos restringir o controller AdminController a usuários logados de duas formas:
    // A primeira, e já conhecida, é atravez de um contrutor que possui um middleware('auth'). Isso faz com que somente usuáros logados possam ter acesso aos métodos deste controller
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // A segunda forma é através da criação de grupos nas rotas.
    
    public function index() {
        // Definindo um array de caminhos
        $caminhos = [
            ['url' => '', 'titulo' => 'Painel']
        ];
        
        return view('admin.index', compact('caminhos'));
    }
}
