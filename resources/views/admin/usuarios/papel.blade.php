@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">Lista de Papéis para {{$usuario->name}}</h2>

        @include('admin._caminho')

        <div class="row">
            <form action="{{route('usuarios.papel.store', $usuario->id)}}" method="post">
                {{ csrf_field() }}
                <div class="input-field">
                    <select name="papel_id" id="papel_id">
                        @foreach ($papeis as $papel)
                            <option value="{{$papel->id}}">{{$papel->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn blue">Adicionar</button>
            </form>
        </div>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Papel</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario->papeis as $papel)
                        <tr>
                            <td>{{$papel->nome}}</td>
                            <td>{{$papel->descricao}}</td>
                            <td>
                                <form action="{{route('usuarios.papel.destroy', [$usuario->id, $papel->id])}}" method="post">
                                    {{-- o helper method_field('name') abaixo irá trocar o method do nosso formulário de "post" para delete, assim como configuramos em nossa rota. --}}
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection