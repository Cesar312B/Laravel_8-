<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RelacioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Laravel\Jetstream\Rules\Role;

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

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/arreglo', function () {
    $arreglo =[
        'id'=> '1',
        'Descripcion'=> 'Descripcion1'
    ];
    return $arreglo;
});

Route::get('/nombre/{nombre}', function($nombre){
 return 'El nombre es: ' .$nombre;
});

Route::get('/cliente/{cliente?}', function($cliente='Cliente general'){
    return 'El nombre es: ' .$cliente;
   });

Route::get('/ruta1', function(){
return 'esta es la vista 1';
})->name('Ruta1');


Route::get('/ruta2', function(){
    return redirect()->route('Ruta1');
    })->name('Ruta2');

    
Route::get('/usuario/{usuario}', function($usuario){
return 'El husuario es:' .$usuario;
})->where('usuario','[0-9]+');


Route::get('/vista1',  [InicioController::class, "index"]);

Route::resource('/movies', 'App\Http\Controllers\MovieController' );
/*
if ( View::exists('vista2'))
{
    Route::get('/ut', function () {
        return view('vista2');
    });


}else{
    Route::get('/', function () {
        return view('welcome');
    });
}
*/

Route::resource('categorias', CategoriaController::class)->middleware('auth');
Route::resource('productos', ProductoController::class)->middleware('auth');

Route::resource('articulos',ArticuloController::class)->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});
