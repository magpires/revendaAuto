<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Papel;

// Para acionarmos nossas regras de ACL nos controllers, é importante importar a classe Gate;
use Illuminate\Support\Facades\Gate;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-view')) {
            abort(403, 'Não autorizado');
        }
        
        // Recuperando todos os usuários no banco
        $usuarios = User::all();

        // Vamos implementar os caminhos aqui também
        $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '', 'titulo' => 'Usuários']
        ];

        return view('admin.usuarios.index', compact('usuarios', 'caminhos'));
    }

    // Os 3 métodos abaixo estão relacionado com a atribuição de papeis a usuários
    public function papel($id) {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-edit')) {
            abort(403, 'Não autorizado');
        }
        
        // Primeiramente, vamos recuperar o usuário escolhido
        $usuario = User::findOrFail($id);

        // Pegamos a lista de papeis
        $papeis = Papel::all();

         // Vamos implementar os caminhos aqui também
         $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => route('usuarios.index'), 'titulo' => 'Usuários'],
            ['url' => '', 'titulo' => 'Papel']
        ];

        return view('admin.usuarios.papel', compact('usuario', 'papeis', 'caminhos'));
    }

    public function papelStore(Request $request, $id) {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-edit')) {
            abort(403, 'Não autorizado');
        }
        
        // Primeiramente, vamos recuperar o usuário escolhido
        $usuario = User::findOrFail($id);

        // Recuperando dados do formulário
        $dados = $request->all();

        // Atribuindo papel a um usuário
        // Encontramos o papel, de acordo com o id capturado no formulário
        $papel = Papel::findOrFail($dados['papel_id']);

        // Atribuimos o papel a este usuário
        $usuario->adicionaPapel($papel);

        return redirect()->back();
    }

    public function papelDestroy($id, $papel_id) {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-edit')) {
            abort(403, 'Não autorizado');
        }
        
        // Primeiramente, vamos recuperar o usuário escolhido
        $usuario = User::findOrFail($id);

        // Atribuindo papel a um usuário
        // Encontramos o papel, de acordo com o id passado para o método
        $papel = Papel::findOrFail($papel_id);

        // removemos o papel a este usuário
        $usuario->removePapel($papel);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-create')) {
            abort(403, 'Não autorizado');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-create')) {
            abort(403, 'Não autorizado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-edit')) {
            abort(403, 'Não autorizado');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-edit')) {
            abort(403, 'Não autorizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Antes de fazermos qualquer coisa, vamos ver se o usuário logado tem a permissão para o método em questão.
        if(Gate::denies('usuario-delete')) {
            abort(403, 'Não autorizado');
        }
    }
}
