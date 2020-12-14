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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/panel', 'HomeController@plantilla');

// Gestion de Usuario
Route::get('/user/modificar', 'UsuarioController@viewModificar');

Route::get('/carrito', 'LibroController@viewCarro');
Route::get('/user/crear', 'UsuarioController@viewCrear');
Route::post('/user/save', 'UsuarioController@save');
Route::post('/user/modificar/save', 'UsuarioController@saveModificar');
Route::post('/user/modificarUsuario', 'UsuarioController@viewModificarUsuario');
Route::post('/user/saveModificarUsuario', 'UsuarioController@modificar');
Route::Resource('users', 'UserController');
Route::Resource('libros', 'ApiLibrosController');
Route::Resource('categorias', 'ApiCategoriaController');
Route::Resource('proveedores', 'ApiProveedorController');
Route::Resource('baja', 'BajaController');



//Categoria
Route::get('categoria', 'CategoriaController@index');
Route::get('reporte', 'CompraController@reporte');
Route::post('categoria/save', 'CategoriaController@save');
//Route::get('categorias/{id}', 'LibroController@categoria');

//Ventas
Route::get('/ventas/ventas', 'ventasController@ventas');


//Libros
Route::get('/crear-libro', array(
    'as'  => 'createLibrounidad',
    'middleware' => 'auth',
    'uses'  => 'LibroController@createLibrounidad'
  ));
Route::get('/crear-libro', array(
    'as'  => 'createLibro',
    'middleware' => 'auth',
    'uses'  => 'LibroController@createLibropeso'
  ));
Route::get('/crear-libro', array(
    'as'  => 'createLibro',
    'middleware' => 'auth',
    'uses'  => 'LibroController@createLibrovolumen'
  ));



Route::get('/imagen/{archivo}', 'LibroController@getImage');
Route::post('/libro/save', 'LibroController@saveLibro');
Route::get('/libro/vendidos', 'LibroController@vendidos');
Route::get('/libro/{id}', 'LibroController@getDescription');
Route::post('/orden', 'LibroController@orden');
Route::post('/comprar', 'CompraController@compra');
Route::post('/ordenCompra', 'LibroController@crearOrden');

//Reportes
//Route::post('reporteLibro', 'LibroController@reporte');
Route::get('reportes/index', 'LibroController@getViewReporte');

Route::get('/generareporte/{id}', 'LibroController@reporte');


Route::get('reportesFecha/{desde}/{hasta}', 'LibroController@reporteFecha');
Route::get ('github', 'PdfController@github');

route::get('barcode','BarcodeController@index');