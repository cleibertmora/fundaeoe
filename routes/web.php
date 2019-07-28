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

Route::get('/',  ['as' => 'home', 'uses' => function () {
    return view('index');
}]);

Route::post('contacto',                     ['uses' => 'UsersController@contacto',    'as' => 'contacto']);


Route::get('/evento', function () {
	return view('eventos.evento');
});

Route::get('/prueba', function () {
	return view('eventos.prueba');
});

Route::get ('/galeria',                     ['uses' => 'AlbumsController@index',       'as' => 'galeria.index']);
Route::get ('/galeria/album/{id}',          ['uses' => 'AlbumsController@show',        'as' => 'galeria.album']);
Route::post('/notificar/pagos',             ['uses' => 'BancoController@notificarPago','as' => 'banco.notoficarPago']);
// Configurar: https://www.mercadopago.com.co/ipn-notifications
//             https://www.mercadopago.com.ar/developers/es/solutions/payments/basic-checkout/receive-notifications/

Route::group(['middleware' => ['auth']], function(){
	Route::get ('/users/{id}/edit',         ['uses' => 'UsersController@edit',          'as' => 'users.editU']);
	Route::put ('/users/{user}',            ['uses' => 'UsersController@update',        'as' => 'users.updateU']);
	Route::get ('/users/eventos',           ['uses' => 'EventosController@misEventos',  'as' => 'users.misEventos']);
	Route::get ('/users/RespEventos',       ['uses' => 'EventosController@RespEventos', 'as' => 'users.RespEventos']);
	Route::get ('/galeria/addimage/{id}',   ['uses' => 'ImagesController@create',       'as' => 'galeria.createImage']);
	Route::post('/galeria/addimage',        ['uses' => 'ImagesController@store',        'as' => 'galeria.storeImage']);
	Route::get ('/eventos/inscribir/{id}',  ['uses' => 'EventosController@inscribir',   'as' => 'eventos.inscribir']);
	Route::post('/eventos/inscribir',       ['uses' => 'EventosController@inscribirS',  'as' => 'eventos.inscribirS']);
	Route::get ('/eventos/eliminarEv/{id}', ['uses' => 'EventosController@eliminarEv',  'as' => 'eventos.eliminarEv']);
	Route::get ('/eventos/eliminarEt/{id}', ['uses' => 'EventosController@eliminarEt',  'as' => 'eventos.eliminarEt']);
	Route::get ('/eventos/pagar/{id}',      ['uses' => 'EventosController@pagarEt',     'as' => 'eventos.pagarEt']);
    Route::post('/eventos/RegisPago',       ['uses' => 'BancoController@pago_add',      'as' => 'banco.regpago']);
	Route::get('/mis-certificados/{id}',   ['uses' => 'CertificateController@show',    'as' => 'certificate.show']);
	Route::resource('tickets', 'TicketController');
	Route::get('/tickets-list',               ['uses' => 'TicketController@list',        'as' => 'tickets.list']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
	Route::resource('users',     'UsersController');
	Route::resource('instituto', 'InstitutoController');
	Route::resource('banco',     'BancoController');
	Route::resource('certificados',     'CertificateController');
	Route::resource('evento',    'EventoController');
	Route::resource('formaPago', 'FormaPagoController');
	Route::resource('material',  'MaterialController');
	Route::resource('politica',  'PoliticaController');
	Route::resource('ponente',   'PonenteController');

	Route::get ('pagos',                         ['uses' => 'PagosController@index',          'as' => 'pagos.index']);
	Route::get ('certificados',                  ['uses' => 'CertificateController@index',          'as' => 'certificado.index']);
	Route::get ('pagos/{id}/edit',               ['uses' => 'PagosController@edit',           'as' => 'pagos.edit']);
	Route::get ('certificados/{id}/edit',        ['uses' => 'CertificateController@edit',     'as' => 'certificados.edit']);
	//Route::get ('certificados/{id}/edit',        ['uses' => 'CertificateController@edit',     'as' => 'certificados.edit']);

	Route::get ('pagos/{id}/verificar',          ['uses' => 'PagosController@verificar',      'as' => 'pagos.verificar']);
	Route::get ('pagos/{id}/rechazar',           ['uses' => 'PagosController@rechazar',       'as' => 'pagos.rechazar']);
	Route::get ('pagos/{id}/porverificar',       ['uses' => 'PagosController@porverificar',   'as' => 'pagos.porverificar']);
	Route::get ('pagos/verificados',             ['uses' => 'PagosController@verificados',    'as' => 'pagos.verificados']);
	Route::get ('pagos/rechazados',              ['uses' => 'PagosController@rechazados',     'as' => 'pagos.rechazados']);
	Route::post('pagos/update',                  ['uses' => 'PagosController@update',         'as' => 'pagos.update']);

	Route::get ('evento/{id}/extend',            ['uses' => 'EventoController@extend',        'as' => 'evento.extend']);
	Route::get ('evento/{id}/reporte',           ['uses' => 'EventoController@reporte',       'as' => 'evento.reporte']);
	Route::post('evento/add_ponente',            ['uses' => 'EventoController@add_ponente',   'as' => 'evento.ponente_add']);
	Route::post('evento/del_ponente',            ['uses' => 'EventoController@del_ponente',   'as' => 'evento.ponente_del']);
	Route::post('evento/add_aval',               ['uses' => 'EventoController@add_aval',      'as' => 'evento.aval_add']);
	Route::post('evento/del_aval',               ['uses' => 'EventoController@del_aval',      'as' => 'evento.aval_del']);
	Route::post('evento/add_paquete',            ['uses' => 'EventoController@add_paquete',   'as' => 'evento.paquete_add']);
	Route::get ('evento/{id}/del_paquete/{idp}', ['uses' => 'EventoController@del_paquete',   'as' => 'evento.paquete_del']);
	Route::post('evento/add_etapa',              ['uses' => 'EventoController@add_etapa',     'as' => 'evento.etapa_add']);
	Route::get ('evento/{id}/del_etapa/{ide}',   ['uses' => 'EventoController@del_etapa',     'as' => 'evento.etapa_del']);

	Route::get ('users/{id}/destroy',        ['uses' => 'UsersController@destroy',    'as' => 'users.destroy']);
	Route::get ('instituto/{id}/destroy',    ['uses' => 'InstitutoController@destroy','as' => 'instituto.destroy']);
	Route::get ('banco/{id}/destroy',        ['uses' => 'BancoController@destroy',    'as' => 'banco.destroy']);
	Route::get ('certificados/{id}/destroy', ['uses' => 'CertificateController@destroy',    'as' => 'certificates.destroy']);
	Route::get (' ',               ['uses' => 'CertificateController@edit',           'as' => 'certificates.edit']);
	Route::get ('evento/{id}/destroy',       ['uses' => 'EventoController@destroy',   'as' => 'evento.destroy']);
	Route::get ('formaPago/{id}/destroy',    ['uses' => 'FormaPagoController@destroy','as' => 'formaPago.destroy']);
	Route::get ('material/{id}/destroy',     ['uses' => 'MaterialController@destroy', 'as' => 'material.destroy']);
	Route::get ('politica/{id}/destroy',     ['uses' => 'PoliticaController@destroy', 'as' => 'politica.destroy']);
	Route::get ('ponente/{id}/destroy',      ['uses' => 'PonenteController@destroy',  'as' => 'ponente.destroy']);
	Route::get ('/galeria/create',           ['uses' => 'AlbumsController@create',    'as' => 'galeria.create']);
	Route::post('/galeria/create',           ['uses' => 'AlbumsController@store',     'as' => 'galeria.store']);
	Route::post('/certificados/create',      ['uses' => 'CertificateController@store',   'as' => 'certificate.store']);
	Route::post('/certificados/update',      ['uses' => 'CertificateController@update',  'as' => 'certificate.update']);
	Route::post('/galeria/pub/{id}',         ['uses' => 'ImagesController@publicar',  'as' => 'foto.publicar']);
	Route::get ('/galeria/deleteAlbum/{id}', ['uses' => 'AlbumsController@destroy',   'as' => 'galeria.deleteAlbum']);
	Route::get ('/galeria/deleteImage/{id}', ['uses' => 'ImagesController@destroy',   'as' => 'foto.deleteImage']);

	Route::post('/certificados/ajax/', array('as' => 'traerNombre', 'uses' => 'CertificateController@cedula'));

	Route::resource('rifas', 'RifaController');

	Route::get('reporte/rifas/',              ['uses' => 'RifaController@reporte',   'as' => 'rifas.reporte']);

	//Route::get('/tickets-list',               ['uses' => 'TicketController@list',        'as' => 'tickets.list']);

	Route::post('/tasa-cambio/ajax/', array('as' => 'fijarTasa', 'uses' => 'ExchangeController@set'));

	Route::post('/tasa-cambio/ajax/get', array('as' => 'fijarTasaGet', 'uses' => 'ExchangeController@get'));

	// Route::get('/tasa-cambio/pruebas', array('as' => 'pruebaTasas', 'uses' => 'EventoController@getExchangeRate'));

//	Route::post('/certificados/ajax/{id}', 'CertificateController@cedula')->name('traerNombre');

});

Route::get ('/eventos',                 ['as' => 'eventos.index',          'uses' => 'EventosController@index']);
Route::get ('/eventos/congresos',       ['as' => 'eventos.congresos',      'uses' => 'EventosController@congresos']);
Route::get ('/eventos/cursos',          ['as' => 'eventos.cursos',         'uses' => 'EventosController@cursos']);
Route::get ('/eventos/capacitaciones',  ['as' => 'eventos.capacitaciones', 'uses' => 'EventosController@capacitaciones']);
Route::get ('/eventos/diplomados',      ['as' => 'eventos.diplomados',     'uses' => 'EventosController@diplomados']);
Route::get ('/eventos/emprendimientos', ['as' => 'eventos.emprendimientos','uses' => 'EventosController@emprendimientos']);
Route::get ('/eventos/jornadas',        ['as' => 'eventos.jornadas',       'uses' => 'EventosController@jornadas']);
Route::get ('/eventos/evento/{id}',     ['as' => 'eventos.evento',         'uses' => 'EventosController@show']);
Route::get ('/consultar-certificado',   ['as' => 'certificados.index',     'uses' => 'CertificadosController@index']);

Route::group(['middleware' => ['web']], function() {
	// Login Routes...
	Route::get('login',                  ['as' => 'login',               'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('login',                 ['as' => 'login.post',          'uses' => 'Auth\LoginController@login']);
	Route::post('logout',                ['as' => 'logout',              'uses' => 'Auth\LoginController@logout']);

	// Registration Routes...
	Route::get('register',               ['as' => 'register',            'uses' => 'Auth\RegisterController@showRegistrationForm']);
	Route::post('register',              ['as' => 'register.post',       'uses' => 'Auth\RegisterController@register']);

	// Password Reset Routes...
	Route::get('password/reset',         ['as' => 'password.request',    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
	Route::post('password/email',        ['as' => 'password.email',      'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
	Route::get('password/reset/{token}', ['as' => 'password.reset',      'uses' => 'Auth\ResetPasswordController@showResetForm']);
	Route::post('password/reset',        ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

