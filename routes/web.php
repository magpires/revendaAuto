<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/addregistros', function () {

  $zero  = App\Categoria::create(['titulo'=>'Zero KM']);
  $semi  = App\Categoria::create(['titulo'=>'Seminovos']);
  $usado = App\Categoria::create(['titulo'=>'Usados']);

  $Honda = App\Marca::create(['titulo'=>'Honda','descricao'=>'Carros Honda']);
  $Chevrolet = App\Marca::create(['titulo'=>'Chevrolet','descricao'=>'Carros Chevrolet']);

  $Camaro = $Chevrolet->carros()->create(['titulo'=>'Camaro','descricao'=>'Automático e completo','ano'=>2017,'valor'=>150000.90]);
  $Civic = App\Carro::create(['marca_id'=>1,'titulo'=>'Civic','descricao'=>'Automático e completo','ano'=>2017,'valor'=>80000.00]);

  $Camaro->categorias()->attach($usado);
  $Camaro->categorias()->attach($semi);

  $categorias = [
      new App\Categoria(['titulo'=>'Nacional']),
      new App\Categoria(['titulo'=>'Destaque']),
      new App\Categoria(['titulo'=>'Luxo'])
  ];

  $Civic->categorias()->saveMany($categorias);
  $Civic->categorias()->attach($semi);

  $usuario = App\User::find(1);

  $usuario->carros()->attach($Civic);
  $usuario->carros()->attach($Camaro);

  return "Registros criados";

});

Route::get('/testesregistros', function () {

  $carro = App\Carro::find(1);
  //dd($carro->marca);

  $marca = App\Marca::find(1);

  //dd($marca->carros);

  //dd($carro->categorias);

  $categoria = App\Categoria::find(2);

  //dd($categoria->carros);

  //dd($carro->usuarios);

  $usuario = App\User::find(1);
  //dd($usuario->carros);

  dd($carro->imagens);


});

Route::get('/addgalerias', function () {

  for($i=1; $i<4;$i++){
    App\Galeria::create([
      'titulo'=> '',
      'carro_id'=> 1,
      'descricao'=> '',
      'url'=> 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'ordem'=> $i
    ]);
    App\Galeria::create([
      'titulo'=> '',
      'carro_id'=> 2,
      'descricao'=> '',
      'url'=> 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'ordem'=> $i
    ]);
  }

  return "Registros criados";


});



Route::get('/', function () {
    $slides = [
      (object)[
        'titulo'=>'Título Imagem',
        'descricao'=>'Descrição Imagem',
        'url'=>'#link',
        'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'

      ]
    ];

    $carros = [
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ],
      (object)[
        'titulo' => 'Nome do Carro',
        'descricao' => 'Descrição do Carro',
        'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
        'valor' => 'R$150.000,00',
        'url' => url('detalhe')
      ]
  ];

    return view('site.home',compact('slides','carros'));
});

Auth::routes();

Route::get('/contato',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.contato',compact('galeria'));
});
Route::get('/detalhe',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.detalhe',compact('galeria'));
});
Route::get('/empresa',function(){
  $galeria = [
    (object)[
      'imagem'=>'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.empresa',compact('galeria'));
});

// A crianção de grupos protegidos nas rotas serve para eliminarmos a necessidade de criar o método construtor nos controller para exigir a autenticação do usuário para acessar os métodos do controller.

// Cria se um grupo com da seguinte forma:
// Route::group(['middleware' => 'auth', 'prefix' => 'nomeprefix'], function() {});

// Exemplo prático
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
  // Todas as rotas dentro deste grupo estarão protegidas com autenticação e irão erdar o prefixo /admin
  // Exemplo www.suaapliacao.com.br/admin/rota1

  Route::get('/', 'Admin\AdminController@index');
  // Observe que na rota anterior, definimos a URL simplesmente com "/", pois como ela está no grupo "/admin", a mesma irá herdar a rota base "/admin"

  // Vamos gerar um controller automático, que vem com alguns métodos e rotas já definidos.
  // Para criar este controller, basta executar o seguinte comando no terminal:
  // php artisan make:controller NomeDoController --resource

  // Para chamar as rotas do controller resource criado, basta colocar o seguinte comando no arquivo de rotas:
  // Route::resource('nomedoelementodocontroller', 'NomeDoController');

  // Exemplo prático
  Route::resource('usuarios', 'Admin\UsuarioController');

  // Caso seja criado algum método extra nesse controller, sua rota deve ser declarada neste arquivo web.php.
  // Não há segredo quanto a declaração de rotas para novos métodos que vem de controllers resources, basta seguir os exemplos abaixo:
  // Para rotas do tipo get: Route::get('suaurl/', ['as' => 'apelido.da.rota', 'uses' => 'NomeDoController@metodoEscolhido']);
  // Para rotas do tipo post: Route::post('suaurl/', ['as' => 'apelido.da.rota', 'uses' => 'NomeDoController@metodoEscolhido']);

  // Como criamos três novos métodos em UsuarioController, vamos criar as rotas para eles
  Route::get('usuarios/papel/{id}', ['as' => 'usuarios.papel', 'uses' => 'Admin\UsuarioController@papel']);
  Route::post('usuarios/papel/{papel}', ['as' => 'usuarios.papel.store', 'uses' => 'Admin\UsuarioController@papelStore']);
  Route::delete('usuarios/papel/{usuario}/{papel}', ['as' => 'usuarios.papel.destroy', 'uses' => 'Admin\UsuarioController@papelDestroy']);

  // Resource de PapelController
  Route::resource('papeis', 'Admin\PapelController');

  // Como criamos três novos métodos em PapelController, vamos criar as rotas para eles
  Route::get('papeis/permissao/{id}', ['as' => 'papeis.permissao', 'uses' => 'Admin\PapelController@permissao']);
  Route::post('papeis/permissao/{permissao}', ['as' => 'papeis.permissao.store', 'uses' => 'Admin\PapelController@permissaoStore']);
  Route::delete('papeis/permissao/{papel}/{permissao}', ['as' => 'papeis.permissao.destroy', 'uses' => 'Admin\PapelController@permissaoDestroy']);

});

// Route::get('/home/{id}', 'HomeController@detalhe');
