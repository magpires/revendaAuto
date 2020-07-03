<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;

class PapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recuperando todos os papéis
        $registros = Papel::all();
        
        // Montando os caminhos
        $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '', 'titulo' => 'Papéis']
        ];

        return view('admin.papel.index', compact('registros', 'caminhos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Montando os caminhos
        $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => route('papeis.index'), 'titulo' => 'Papéis'],
            ['url' => '', 'titulo' => 'Adicionar']
        ];

        return view('admin.papel.adicionar', compact('caminhos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Aqui nós verificamos se o usuário preencheu o nome do papel e se esse papel não é um Adm
        if ($request['nome'] && $request['nome'] != 'Admin') {
            Papel::create($request->all());

            return redirect()->route('papeis.index');
        }
        return redirecti()->back();
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
        // Verificando se ele não é o papel Adm. Caso seja, nós barramos a operação.
        if (Papel::findOrFail($id)->nome == 'Admin') {
            return redirect()->route('papeis.index');
        }

        // Recuperando o papel a ser editado
        $registro = Papel::findOrFail($id);
        
        // Montando os caminhos
        $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => route('papeis.index'), 'titulo' => 'Papéis'],
            ['url' => '', 'titulo' => 'Editar']
        ];

        return view('admin.papel.editar', compact('registro', 'caminhos'));
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
        // Verificando se ele não é o papel Adm. Caso seja, nós barramos a operação.
        if (Papel::findOrFail($id)->nome == 'Admin') {
            return redirect()->route('papeis.index');
        }

        // Aqui nós verificamos se o usuário preencheu o nome do papel e se esse papel não é um Adm
        if ($request['nome'] && $request['nome'] != 'Admin') {
            Papel::find($id)->update($request->all());
        }

        return redirect()->route('papeis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Verificando se ele não é o papel Adm. Caso seja, nós barramos a operação.
        if (Papel::findOrFail($id)->nome == 'Admin') {
            return redirect()->route('papeis.index');
        }

        // Recuperando o papel
        Papel::findOrFail($id)->delete();
        
        return redirect()->route('papeis.index');
    }
}
