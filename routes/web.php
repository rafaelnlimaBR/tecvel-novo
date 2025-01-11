<?php

use App\Models\AppContato;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/novo', [App\Http\Controllers\ClienteController::class, 'novo'])->name('cliente.novo');
Route::get('/cliente/editar/{id}', [App\Http\Controllers\ClienteController::class, 'editar'])->name('cliente.editar');
Route::post('/cliente/cadastrar', [App\Http\Controllers\ClienteController::class, 'cadastrar'])->name('cliente.cadastrar');
Route::post('/cliente/adicionar/contato', [App\Http\Controllers\ClienteController::class, 'adicionarContato'])->name('cliente.adicionar.contato');

View::composer(['admin.contatos.formulario'],function($view){
    $view->with(['aplicativos'=>AppContato::all()]);
});

Route::get('/',function(){
    $cliente    =   Cliente::find(100);
    return $cliente->nome;

});
