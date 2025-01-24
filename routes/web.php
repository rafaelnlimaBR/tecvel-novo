<?php

use App\Models\AppContato;
use App\Models\Cliente;
use App\Models\Configuracao;
use App\Models\Contrato;
use App\Models\Modelo;
use \App\Models\Veiculo;
use \App\Models\Montadora;
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
//CONTRATOS
Route::get('/contratos', [App\Http\Controllers\ContratoController::class, 'index'])->name('contrato.index');
Route::get('/contrato/novo', [App\Http\Controllers\ContratoController::class, 'novo'])->name('contrato.novo');
Route::get('/contrato/editar/{id}/historico/{historico_id}', [App\Http\Controllers\ContratoController::class, 'editar'])->name('contrato.editar');
Route::get('/contrato/{id}/modelos', [App\Http\Controllers\ContratoController::class, 'modelos'])->name('contrato.modelos');
Route::post('/contrato/atualizar', [App\Http\Controllers\ContratoController::class, 'atualizar'])->name('contrato.atualizar');
Route::post('/contrato/cadastrar', [App\Http\Controllers\ContratoController::class, 'cadastrar'])->name('contrato.cadastrar');
Route::post('/contrato/excluir', [App\Http\Controllers\ContratoController::class, 'excluir'])->name('contrato.excluir');
Route::post('/contrato/novo/status', [App\Http\Controllers\ContratoController::class, 'mudarStatus'])->name('contrato.novo.status');
Route::post('/contrato/adicionar/servico', [App\Http\Controllers\ContratoController::class, 'adicionarServico'])->name('contrato.adicionar.servico');
Route::post('/contrato/remover/servico', [App\Http\Controllers\ContratoController::class, 'removerServico'])->name('contrato.remover.servico');
//Route::get('/contratos/refresh', [App\Http\Controllers\ContratoController::class, 'refresh'])->name('contrato.refresh'); atualizar a pagina a cada certos segundos

//CLIENTES
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/novo', [App\Http\Controllers\ClienteController::class, 'novo'])->name('cliente.novo');
Route::get('/cliente/editar/{id}', [App\Http\Controllers\ClienteController::class, 'editar'])->name('cliente.editar');
Route::post('/cliente/cadastrar', [App\Http\Controllers\ClienteController::class, 'cadastrar'])->name('cliente.cadastrar');
Route::post('/cliente/atualizar', [App\Http\Controllers\ClienteController::class, 'atualizar'])->name('cliente.atualizar');
Route::post('/cliente/atualizar/contato', [App\Http\Controllers\ClienteController::class, 'atualizarContato'])->name('cliente.atualizar.contato');
Route::post('/cliente/adicionar/contato', [App\Http\Controllers\ClienteController::class, 'adicionarContato'])->name('cliente.adicionar.contato');
Route::post('/cliente/excluir/contato', [App\Http\Controllers\ClienteController::class, 'excluirContato'])->name('cliente.excluir.contato');
Route::post('/cliente/pesquisa/json', [App\Http\Controllers\ClienteController::class, 'clientesJson'])->name('cliente.pesquisar.json');

//MARCAS DE VEICULOS
Route::get('/montadoras', [App\Http\Controllers\MontadoraController::class, 'index'])->name('montadora.index');
Route::get('/montadora/novo', [App\Http\Controllers\MontadoraController::class, 'novo'])->name('montadora.novo');
Route::get('/montadora/editar/{id}', [App\Http\Controllers\MontadoraController::class, 'editar'])->name('montadora.editar');
Route::get('/montadora/{id}/modelos', [App\Http\Controllers\MontadoraController::class, 'modelos'])->name('montadora.modelos');
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
Route::Post('/veiculo/pesquisa/json', [App\Http\Controllers\VeiculoController::class, 'veiculosJson'])->name('veiculo.pesquisar.json');

//STATUS
Route::get('/status', [App\Http\Controllers\StatusController::class, 'index'])->name('status.index');
Route::get('/status/novo', [App\Http\Controllers\StatusController::class, 'novo'])->name('status.novo');
Route::get('/status/editar/{id}', [App\Http\Controllers\StatusController::class, 'editar'])->name('status.editar');
Route::post('/status/atualizar', [App\Http\Controllers\StatusController::class, 'atualizar'])->name('status.atualizar');
Route::post('/status/cadastrar', [App\Http\Controllers\StatusController::class, 'cadastrar'])->name('status.cadastrar');
Route::post('/status/adicionar-proximo-status', [App\Http\Controllers\StatusController::class, 'vincularStatus'])->name('status.vincularStatus');
Route::post('/status/remover-proximo-status', [App\Http\Controllers\StatusController::class, 'desvincularStatus'])->name('status.desvincularStatus');
Route::post('/status/excluir', [App\Http\Controllers\StatusController::class, 'excluir'])->name('status.excluir');

//SERVICOS
Route::get('/servicos', [App\Http\Controllers\ServicoController::class, 'index'])->name('servico.index');
Route::get('/servico/novo', [App\Http\Controllers\ServicoController::class, 'novo'])->name('servico.novo');
Route::get('/servico/editar/{id}', [App\Http\Controllers\ServicoController::class, 'editar'])->name('servico.editar');
Route::get('/servico/{id}/modelos', [App\Http\Controllers\ServicoController::class, 'modelos'])->name('servico.modelos');
Route::post('/servico/atualizar', [App\Http\Controllers\ServicoController::class, 'atualizar'])->name('servico.atualizar');
Route::post('/servico/cadastrar', [App\Http\Controllers\ServicoController::class, 'cadastrar'])->name('servico.cadastrar');
Route::post('/servico/excluir', [App\Http\Controllers\ServicoController::class, 'excluir'])->name('servico.excluir');

View::composer(['admin.contatos.formulario','admin.contatos.tabela','admin.clientes.formulario-modal'],function($view){
    $view->with(['aplicativos'=>AppContato::all()]);
});
View::composer(['admin.veiculos.form'],function($view){
   $view->with(['montadoras'    =>  Montadora::all()]);
   $view->with(['cores'         =>  Veiculo::$cores]);
});
View::composer(['admin.status.formulario'],function($view){
   $view->with(['todos_status'        =>\App\Models\Status::all()]);
});

Route::get('/',function(    ){

    $contrato   =   Contrato::find(2);




});
