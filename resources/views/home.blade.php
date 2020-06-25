@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Lista de chamados</h2>

        @forelse ($chamados as $chamado)
            <p>{{$chamado->titulo}} <a href="/home/{{$chamado->id}}">Editar</a></p>
        @empty
            <p>Não existem chamados</p>
        @endforelse
    </div>
</div>
@endsection
