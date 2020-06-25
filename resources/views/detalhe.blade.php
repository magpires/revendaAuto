@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Nós podemos verificar a permissão na view de detalhes e exibir uma mensagem, caso a permissão seja negada. Assim, não é necessário fazer a validação no controller, apenas na view. Deixando assim que, por exemplo, a validação só seja feita no controller quando um método 100% back-end for utilizado. Por exemplo, um método que deleta um chamado --}}
        @can('ver-chamado', $chamado)
            <h2>Detalhes do chamado</h2>

            <p>Titulo: {{$chamado->titulo}}</p>
            <p>Status: {{$chamado->status}}</p>
            <p>Dono do chamado: {{$chamado->user->name}}</p>
        @else
            <h3>Você não tem permissão para acessar esse registro</h3>
        @endcan
    </div>
</div>
@endsection
