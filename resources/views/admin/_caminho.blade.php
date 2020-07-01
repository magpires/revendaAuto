{{-- Este arquivo será incluído pelas páginas e servirá para adicionarmos um sistema de navegação para os usuários saberem a rota até determinado link --}}
<div class="row">
    <nav>
        <div class="nav-wrapp {{config('app.corSite')}}">
            <div class="col s12">
                @if(isset($caminhos))
                    @foreach($caminhos as $caminho)
                        @if($caminho['url'])
                            <a href="{{$caminho['url']}}" class="breadcrumb">{{$caminho['titulo']}}</a>
                        @else
                            <span class="breadcrumb">{{$caminho['titulo']}}</span>
                        @endif
                    @endforeach
                @else
                    <span class="breadcrumb">Admin</span>
                @endif
            </div>
        </div>
    </nav>
</div>