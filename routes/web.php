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


View::composer(['admin.contatos.formulario','admin.contatos.tabela'],function($view){
    $view->with(['aplicativos'=>AppContato::all()]);
});

Route::get('/{numero}',function($numero){


    $contato                =   App\Models\Contato::where('numero',$numero);


    if($contato->exists()){

        return $contato->first()->id;
    }else{
        $contato                =   new App\Models\Contato();
        $contato->numero        =   $numero;
        $contato->app_id        =   '1';

        if($contato->save()){
            return $contato->id;
        }
    }



});
