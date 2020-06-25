@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Detalhes do chamado</h2>

        <p>Titulo: {{$chamado->titulo}}</p>
        <p>Status: {{$chamado->status}}</p>
        <p>Dono do chamado: {{$chamado->user->name}}</p>
    </div>
</div>
@endsection
