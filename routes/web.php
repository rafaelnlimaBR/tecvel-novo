<?php

use App\Models\AppContato;
use App\Models\Cliente;
use App\Models\Modelo;
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
//CLIENTES
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/novo', [App\Http\Controllers\ClienteController::class, 'novo'])->name('cliente.novo');
Route::get('/cliente/editar/{id}', [App\Http\Controllers\ClienteController::class, 'editar'])->name('cliente.editar');
Route::post('/cliente/cadastrar', [App\Http\Controllers\ClienteController::class, 'cadastrar'])->name('cliente.cadastrar');
Route::post('/cliente/atualizar', [App\Http\Controllers\ClienteController::class, 'atualizar'])->name('cliente.atualizar');
Route::post('/cliente/atualizar/contato', [App\Http\Controllers\ClienteController::class, 'atualizarContato'])->name('cliente.atualizar.contato');
Route::post('/cliente/adicionar/contato', [App\Http\Controllers\ClienteController::class, 'adicionarContato'])->name('cliente.adicionar.contato');
Route::post('/cliente/excluir/contato', [App\Http\Controllers\ClienteController::class, 'excluirContato'])->name('cliente.excluir.contato');

//MARCAS DE VEICULOS
Route::get('/montadoras', [App\Http\Controllers\MontadoraController::class, 'index'])->name('montadora.index');
Route::get('/montadora/novo', [App\Http\Controllers\MontadoraController::class, 'novo'])->name('montadora.novo');
Route::get('/montadora/editar/{id}', [App\Http\Controllers\MontadoraController::class, 'editar'])->name('montadora.editar');
Route::post('/montadora/atualizar', [App\Http\Controllers\MontadoraController::class, 'atualizar'])->name('montadora.atualizar');
Route::post('/montadora/cadastrar', [App\Http\Controllers\MontadoraController::class, 'cadastrar'])->name('montadora.cadastrar');
Route::post('/montadora/excluir', [App\Http\Controllers\MontadoraController::class, 'excluir'])->name('montadora.excluir');

//MODELOS DE VEICULOS
Route::get('/modelo', [App\Http\Controllers\ModeloController::class, 'index'])->name('modelo.index');
Route::get('/modelo/novo', [App\Http\Controllers\ModeloController::class, 'novo'])->name('modelo.novo');
Route::get('/modelo/editar/{id}', [App\Http\Controllers\ModeloController::class, 'editar'])->name('modelo.editar');
Route::get('/{id}/marcaJson', [App\Http\Controllers\ModeloController::class, 'Json'])->name('modelo.Json');
Route::post('/modelo/atualizar', [App\Http\Controllers\ModeloController::class, 'atualizar'])->name('modelo.atualizar');
Route::post('/modelo/cadastrar', [App\Http\Controllers\ModeloController::class, 'cadastrar'])->name('modelo.cadastrar');
Route::post('/modelo/excluir', [App\Http\Controllers\ModeloController::class, 'excluir'])->name('modelo.excluir');

//VEICULOS
Route::get('/veiculos', [App\Http\Controllers\VeiculoController::class, 'index'])->name('veiculo.index');
Route::get('/veiculo/novo', [App\Http\Controllers\VeiculoController::class, 'novo'])->name('veiculo.novo');
Route::get('/veiculo/editar/{id}', [App\Http\Controllers\VeiculoController::class, 'editar'])->name('veiculo.editar');
Route::post('/veiculo/atualizar', [App\Http\Controllers\VeiculoController::class, 'atualizar'])->name('veiculo.atualizar');
Route::post('/veiculo/cadastrar', [App\Http\Controllers\VeiculoController::class, 'cadastrar'])->name('veiculo.cadastrar');
Route::post('/veiculo/excluir', [App\Http\Controllers\VeiculoController::class, 'excluir'])->name('veiculo.excluir');

View::composer(['admin.contatos.formulario','admin.contatos.tabela'],function($view){
    $view->with(['aplicativos'=>AppContato::all()]);
});

Route::get('/',function(    ){
    return \App\Models\Veiculo::$cores;
    $modelo     =   Modelo::find(1);
    $modeloJson =   ['modelo'=>$modelo->nome,'montadora'=>$modelo->montadora->nome];
    return $modeloJson;


});
