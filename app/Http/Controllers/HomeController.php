<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chamado;
use Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $chamados = Chamado::where('user_id', $user->id)->get();

        return view('home', compact('chamados'));
    }

    public function detalhe($id) {
        $chamado = Chamado::find($id);

        // Antes de exibir os detalhes de um chamado, validamos as permissões com o método Authorize.
        // Este método recebe o nome da regra e uma instância da model ao qual será validada a regra.
        // A chanada do método segue o exemplo:

        // $this->authorize('nome-da-regra', $instanciaDaModel);
        // $this->authorize('ver-chamado', $chamado);

        // Também é possível validar as permissões passando uma mensagem personalizada, caso a mesma seja negada.
        // No exemplo abaixo, utilizamos o método denies(), que retorna true, caso a permissão seja negada.
        // Faz-se a validação com mensagem personalizada desta forma:

        // if(Gate::denies('nome-da-regra', $instanciaDaModel)) {
        //     abort(403, "Sua mensagem");
        // }

        // Exemplo prático.
        // if(Gate::denies('ver-chamado', $chamado)) {
        //     abort(403, "Não autorizado");
        // }

        // O exemplo abaixo é o oposto do método denies(). Aqui, ele retorna true, caso o usuário tenha acesso o usuário tenha acesso a uma determinada regra.
        if(Gate::allows('ver-chamado', $chamado)) {
            return view('detalhe', compact('chamado'));
        }

        abort(403, "Não autorizado");

        // return view('detalhe', compact('chamado'));

        // PS: Você não é obrigado a retornar uma mensagem de "Não autorizado" quando um usuário tenta acessar algo restrito a ele. Você é livre pra retornar uma view ou rota no método denies(), fazendo com que, por exemplo, o usuário retorne a home.
        // Tudo vai depender da situação. A mesma observação vale para o inverso, onde validamos com allows
    }
}
