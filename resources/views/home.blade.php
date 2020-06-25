@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Lista de chamados</h2>

        {{-- @forelse ($chamados as $chamado)
            <p>{{$chamado->titulo}} <a href="/home/{{$chamado->id}}">Editar</a></p>
        @empty
            <p>Não existem chamados</p>
        @endforelse --}}

        {{-- Também é possível validar permissões na view. No exemplo a seguir, utilizamos o método @can('nome-da-regra', $instanciaDaModel) --}}
        {{-- Isso serve para deixar o controller mais limpo --}}
        {{-- @forelse ($chamados as $chamado)
            @can('ver-chamado', $chamado)
                <p>{{$chamado->titulo}} <a href="/home/{{$chamado->id}}">Editar</a></p>
            @endcan --}}
            {{-- Ao executar a validação na view, o sistema só ira exibir os chamados daquele usuário logado, conforme a regra criada --}}
        {{-- @empty
            <p>Não existem chamados</p>
        @endforelse --}}

        {{-- As possibilidades são muitas. Neste exemplo prático abaixo, estamos exibindo todos os chamados, mas apenas os chamados do usuário logado terão o link 'Editar' a mostra --}}
        {{-- @forelse ($chamados as $chamado)
            
            <p>{{$chamado->titulo}}
                @can('ver-chamado', $chamado)
                    <a href="/home/{{$chamado->id}}">Editar</a>
                @endcan
            </p>
        @empty
            <p>Não existem chamados</p>
        @endforelse --}}

        {{-- Com a criação da model de policy mais elaborada, com os métodos e uses já inclusos, podemos usar as regras da seguinte forma --}}
        
        {{-- Este can('nome-da-regra', App\NomeDaModel::class) serve para validar quem pode criar um chamado. --}}
        {{-- Reparem que temos que passar a model a qual pertence esta regra, pois o Laravel não consegue saber buscar a classe correta --}}
        @can('create', App\Chamado::class)
            <p>Criar Chamado</p>
        @endcan
        
        @forelse ($chamados as $chamado)
            
            <p>{{$chamado->titulo}}
                @can('update', $chamado)
                    <a href="/home/{{$chamado->id}}">Editar</a>
                @endcan
                @can('delete', $chamado)
                    <a href="/home/{{$chamado->id}}">Deletar</a>
                @endcan
            </p>
        @empty
            <p>Não existem chamados</p>
        @endforelse
    </div>
</div>
@endsection
