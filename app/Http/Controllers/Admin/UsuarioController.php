<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Papel;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        
    }

    public function papelDestroy($id, $papel_id) {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
