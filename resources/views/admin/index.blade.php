@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="center">Admin</h2>
    </div>

    {{-- Inclusão da view '_caminho' --}}
    @include('admin._caminho')

    <div class="row">
            
        {{-- Observe que aqui nós estamos avaliando se o usuário tem a permissão para visualizar usuários. O mesmo acontecerá com as outras funcionalidades da blade de admin do sistema --}}
        @can('usuario-view')
            <div class="col s12 m6">
                <div class="card purple darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Usuários</span>
                        <p>Usuários do sistema</p>
                    </div>
                    <div class="card-action">
                        {{-- Chamando a rota do controller resource UsuarioController --}}
                        <a href="{{route('usuarios.index')}}">Visualizar</a>
                    </div>
                </div>
            </div>
        @endcan

        @can('favorito-view')
            <div class="col s12 m6">
                <div class="card blue">
                    <div class="card-content white-text">
                        <span class="card-title">Favoritos</span>
                        <p>Lista os carros favoritos</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Visualizar</a>
                    </div>
                </div>
            </div>
        @endcan

        @can('perfil-view')
            <div class="col s12 m6">
                <div class="card green">
                    <div class="card-content white-text">
                        <span class="card-title">Perfil</span>
                        <p>Altera os dados do perfil</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Visualizar</a>
                    </div>
                </div>
            </div>
        @endcan

        @can('papel-view')
            <div class="col s12 m6">
                <div class="card orange darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Papéis</span>
                        <p>Listar papéis do sistema</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('papeis.index')}}">Visualizar</a>
                    </div>
                </div>
            </div>
        @endcan
    </div>
</div>
@endsection
