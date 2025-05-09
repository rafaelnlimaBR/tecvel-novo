<?php

use App\Http\Controllers\Front\SiteController;
use App\Models\AppContato;
use App\Models\Cliente;
use App\Models\Configuracao;
use App\Models\Contato;
use App\Models\Contrato;
use App\Models\FormaPagamento;
use App\Models\Modelo;
use App\Models\Servico;
use App\Models\TipoPagamento;
use \App\Models\Veiculo;
use \App\Models\Montadora;
use App\Models\Whatsapp;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

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
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){


    Route::get('carregarDadosAjax', [App\Http\Controllers\Controller::class,'carregarDadosAjax'])->name('carregarDadosAjax');

//CONTRATOS
    Route::get('/contratos', [App\Http\Controllers\ContratoController::class, 'index'])->name('contrato.index');
    Route::get('/contrato/novo', [App\Http\Controllers\ContratoController::class, 'novo'])->name('contrato.novo');
    Route::get('/contrato/editar/{id}/historico/{historico_id}', [App\Http\Controllers\ContratoController::class, 'editar'])->name('contrato.editar');
    Route::get('/contrato/{id}/modelos', [App\Http\Controllers\ContratoController::class, 'modelos'])->name('contrato.modelos');
    Route::post('/contrato/atualizar', [App\Http\Controllers\ContratoController::class, 'atualizar'])->name('contrato.atualizar');
    Route::post('/contrato/cadastrar', [App\Http\Controllers\ContratoController::class, 'cadastrar'])->name('contrato.cadastrar');
    Route::get('/contrato/excluir/{contrato}', [App\Http\Controllers\ContratoController::class, 'excluir'])->name('contrato.excluir');
    Route::post('/contrato/novo/status', [App\Http\Controllers\ContratoController::class, 'mudarStatus'])->name('contrato.novo.status');
    Route::post('/contrato/adicionar/servico', [App\Http\Controllers\ContratoController::class, 'adicionarServico'])->name('contrato.adicionar.servico');
    Route::post('/contrato/remover/servico', [App\Http\Controllers\ContratoController::class, 'removerServico'])->name('contrato.remover.servico');
    Route::post('/contrato/atualizar/servico', [App\Http\Controllers\ContratoController::class, 'atualizarServico'])->name('contrato.atualizar.servico');
    Route::post('/contrato/adicionar/peca', [App\Http\Controllers\ContratoController::class, 'adicionarPeca'])->name('contrato.adicionar.peca');
    Route::post('/contrato/remover/peca', [App\Http\Controllers\ContratoController::class, 'removerPeca'])->name('contrato.remover.peca');
    Route::post('/contrato/atualizar/peca', [App\Http\Controllers\ContratoController::class, 'atualizarPeca'])->name('contrato.atualizar.peca');
    Route::get('/contrato/detalhes/{contrato}', [App\Http\Controllers\ContratoController::class, 'visualizacao'])->name('contrato.visualizacao');
    Route::get('/contrato/baixar/pdf/{contrato}', [App\Http\Controllers\ContratoController::class, 'baixarPDF'])->name('contrato.baixar.pdf');
    Route::get('/contrato/{id}/entrada', [App\Http\Controllers\ContratoController::class, 'entrada'])->name('contrato.entrada');
    Route::post('/contrato/faturar', [App\Http\Controllers\ContratoController::class, 'faturar'])->name('contrato.faturar');
    Route::post('/contrato//atualziar/entrada/', [App\Http\Controllers\ContratoController::class, 'atualizarEntrada'])->name('contrato.atualizar.faturar');
    Route::get('/contrato/{id}/entrada/editar/{entrada_id}', [App\Http\Controllers\ContratoController::class, 'editarEntrada'])->name('contrato.editar.entrada');
    Route::get('/contrato/{id}/entrada/excluir/{entrada_id}', [App\Http\Controllers\ContratoController::class, 'excluirEntrada'])->name('contrato.excluir.entrada');
    Route::get('/contrato/{contrato}/enviar/invoice/aplicativos', [App\Http\Controllers\ContratoController::class, 'enviarInvoiceAplicativos'])->name('contrato.enviar.invoice.aplicativos');
    Route::get('/contrato/{contrato}/enviar/invoice/email', [App\Http\Controllers\ContratoController::class, 'enviarInvoiceEmail'])->name('contrato.enviar.invoice.email');
    Route::get('/contrato/editar/{id}/historico/{historico_id}/nova/nota', [App\Http\Controllers\NotaController::class, 'novo'])->name('contrato.nova.nota');
    Route::get('/contrato/editar/{id}/historico/{historico_id}/editar/nota/{nota_id}', [App\Http\Controllers\NotaController::class, 'editar'])->name('contrato.editar.nota');
    Route::get('/contrato/editar/{id}/historico/{historico_id}/editar/nota/{nota_id}/enviar/imagens/whatsapp', [App\Http\Controllers\NotaController::class, 'enviarImagensAplicativos'])->name('contrato.enviar.imagens.aplicativo');
    Route::post('/contrato/cadastrar/nota', [App\Http\Controllers\NotaController::class, 'cadastrar'])->name('contrato.cadastrar.nota');
    Route::post('/contrato/atualizar/nota', [App\Http\Controllers\NotaController::class, 'atualizar'])->name('contrato.atualizar.nota');
    Route::get('/contrato/excluir/nota/{id}', [App\Http\Controllers\NotaController::class, 'excluir'])->name('contrato.excluir.nota');
    Route::post('/contrato/adicionar/imagens', [App\Http\Controllers\NotaController::class, 'adicionarImagens'])->name('contrato.adicionar.imagens');
    Route::post('/contrato/atualizar/imagens', [App\Http\Controllers\NotaController::class, 'atualizarImagens'])->name('contrato.atualizar.imagens');
    Route::get('/contrato/excluir/imagens/{id}', [App\Http\Controllers\NotaController::class, 'excluirImagens'])->name('contrato.excluir.imagens');


//COMISSÃO
    Route::get('/contrato/{id}/historico/{historico_id}/nova/comissao/', [App\Http\Controllers\ComissaoController::class, 'novo'])->name('contrato.nova.comissao');
    Route::get('/contrato/{id}/historico/{historico_id}/editar/comissao/{comissao_id}', [App\Http\Controllers\ComissaoController::class, 'editar'])->name('contrato.editar.comissao');
    Route::get('/contrato/{id}/historico/{historico_id}/editar/comissao/{comissao_id}/novo/pagamento', [App\Http\Controllers\ComissaoController::class, 'novoPagamento'])->name('contrato.editar.comissao.novo.pagamento');
    Route::get('/contrato/{id}/historico/{historico_id}/editar/comissao/{comissao_id}/editar/pagamento/{saida_id}', [App\Http\Controllers\ComissaoController::class, 'editarPagamento'])->name('contrato.editar.comissao.editar.pagamento');
    Route::post('/contrato/cadastrar/comissao', [App\Http\Controllers\ComissaoController::class, 'cadastrar'])->name('cadastrar.comissao');
    Route::post('/contrato/atualizar/comissao', [App\Http\Controllers\ComissaoController::class, 'atualizar'])->name('atualizar.comissao');
    Route::post('/contrato/comissao/salvar/pagamento', [App\Http\Controllers\ComissaoController::class, 'salvarPagamento'])->name('comissao.salvar.pagamento');
    Route::post('/contrato/comissao/atualizar/pagamento', [App\Http\Controllers\ComissaoController::class, 'atualizarPagamento'])->name('comissao.atualizar.pagamento');
    Route::get('/contrato/{id}/historico/{historico_id}/comissao/excluir/{comissao_id}', [App\Http\Controllers\ComissaoController::class, 'excluir'])->name('comissao.excluir');
    Route::get('/contrato/{id}/historico/{historico_id}/comissao/{comissao_id}/excluir/pagamento/{saida_id}', [App\Http\Controllers\ComissaoController::class, 'excluirPagamento'])->name('comissao.excluir.pagamento');


//Route::get('/contratos/refresh', [App\Http\Controllers\ContratoController::class, 'refresh'])->name('contrato.refresh'); atualizar a pagina a cada certos segundos

//FORNECEDORES
    Route::get('/fornecedores', [App\Http\Controllers\FornecedorController::class, 'index'])->name('fornecedor.index');
    Route::get('/fornecedor/novo', [App\Http\Controllers\FornecedorController::class, 'novo'])->name('fornecedor.novo');
    Route::get('/fornecedor/editar/{id}', [App\Http\Controllers\FornecedorController::class, 'editar'])->name('fornecedor.editar');
    Route::post('/fornecedor/cadastrar', [App\Http\Controllers\FornecedorController::class, 'cadastrar'])->name('fornecedor.cadastrar');
    Route::post('/fornecedor/atualizar', [App\Http\Controllers\FornecedorController::class, 'atualizar'])->name('fornecedor.atualizar');
    Route::get('/fornecedor/excluir/{id}', [App\Http\Controllers\FornecedorController::class, 'excluir'])->name('fornecedor.excluir');
    Route::post('/fornecedor/pesquisa/json', [App\Http\Controllers\FornecedorController::class, 'fornecedoresJson'])->name('fornecedor.pesquisar.json');

//USUARIOS
    Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/usuario/novo', [App\Http\Controllers\UsuarioController::class, 'novo'])->name('usuario.novo');
    Route::get('/usuario/editar/{user}', [App\Http\Controllers\UsuarioController::class, 'editar'])->name('usuario.editar');
    Route::post('/usuario/cadastrar', [App\Http\Controllers\UsuarioController::class, 'cadastrar'])->name('usuario.cadastrar');
    Route::post('/usuario/atualizar/{usuario}', [App\Http\Controllers\UsuarioController::class, 'atualizar'])->name('usuario.atualizar');
    Route::get('/usuario/excluir/{usuario}', [App\Http\Controllers\UsuarioController::class, 'excluir'])->name('usuario.excluir');





//CLIENTES
    Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/novo', [App\Http\Controllers\ClienteController::class, 'novo'])->name('cliente.novo');
    Route::get('/cliente/editar/{cliente}', [App\Http\Controllers\ClienteController::class, 'editar'])->name('cliente.editar');
    Route::post('/cliente/cadastrar', [App\Http\Controllers\ClienteController::class, 'cadastrar'])->name('cliente.cadastrar');
    Route::post('/cliente/atualizar/{cliente}', [App\Http\Controllers\ClienteController::class, 'atualizar'])->name('cliente.atualizar');
    Route::get('/cliente/excluir/{cliente}', [App\Http\Controllers\ClienteController::class, 'excluir'])->name('cliente.excluir');
    Route::get('/cliente/atualizar/contato', [App\Http\Controllers\ClienteController::class, 'atualizarContato'])->name('cliente.atualizar.contato');
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

//GRUPOS DE USUÁRIOS
    Route::get('/grupos', [App\Http\Controllers\GrupoController::class, 'index'])->name('grupo.index');
    Route::get('/grupo/novo', [App\Http\Controllers\GrupoController::class, 'novo'])->name('grupo.novo');
    Route::get('/grupo/editar/{grupo}', [App\Http\Controllers\GrupoController::class, 'editar'])->name('grupo.editar');
    Route::get('/grupo/{id}/modelos', [App\Http\Controllers\GrupoController::class, 'modelos'])->name('grupo.modelos');
    Route::post('/grupo/atualizar', [App\Http\Controllers\GrupoController::class, 'atualizar'])->name('grupo.atualizar');
    Route::post('/grupo/cadastrar', [App\Http\Controllers\GrupoController::class, 'cadastrar'])->name('grupo.cadastrar');
    Route::post('/grupo/excluir', [App\Http\Controllers\GrupoController::class, 'excluir'])->name('grupo.excluir');

//MODELOS DE VEICULOS
    Route::get('/modelo', [App\Http\Controllers\ModeloController::class, 'index'])->name('modelo.index');
    Route::get('/modelo/novo', [App\Http\Controllers\ModeloController::class, 'novo'])->name('modelo.novo');
    Route::get('/modelo/editar/{modelo}', [App\Http\Controllers\ModeloController::class, 'editar'])->name('modelo.editar');
    Route::get('/{id}/marcaJson', [App\Http\Controllers\ModeloController::class, 'Json'])->name('modelo.Json');
    Route::post('/modelo/atualizar/{modelo}', [App\Http\Controllers\ModeloController::class, 'atualizar'])->name('modelo.atualizar');
    Route::post('/modelo/cadastrar', [App\Http\Controllers\ModeloController::class, 'cadastrar'])->name('modelo.cadastrar');
    Route::get('/modelo/excluir/{modelo}', [App\Http\Controllers\ModeloController::class, 'excluir'])->name('modelo.excluir');

//VEICULOS
    Route::get('/veiculos', [App\Http\Controllers\VeiculoController::class, 'index'])->name('veiculo.index');
    Route::get('/veiculo/novo', [App\Http\Controllers\VeiculoController::class, 'novo'])->name('veiculo.novo');
    Route::get('/veiculo/editar/{veiculo}', [App\Http\Controllers\VeiculoController::class, 'editar'])->name('veiculo.editar');
    Route::post('/veiculo/atualizar/{veiculo}', [App\Http\Controllers\VeiculoController::class, 'atualizar'])->name('veiculo.atualizar');
    Route::post('/veiculo/cadastrar', [App\Http\Controllers\VeiculoController::class, 'cadastrar'])->name('veiculo.cadastrar');
    Route::get('/veiculo/excluir/{veiculo}', [App\Http\Controllers\VeiculoController::class, 'excluir'])->name('veiculo.excluir');
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
    Route::get('/servicos/json', [App\Http\Controllers\ServicoController::class, 'servicoJson'])->name('servico.json');
    Route::get('/servico/novo', [App\Http\Controllers\ServicoController::class, 'novo'])->name('servico.novo');
    Route::get('/servico/editar/{id}', [App\Http\Controllers\ServicoController::class, 'editar'])->name('servico.editar');
    Route::get('/servico/{id}/modelos', [App\Http\Controllers\ServicoController::class, 'modelos'])->name('servico.modelos');
    Route::post('/servico/atualizar', [App\Http\Controllers\ServicoController::class, 'atualizar'])->name('servico.atualizar');
    Route::post('/servico/cadastrar', [App\Http\Controllers\ServicoController::class, 'cadastrar'])->name('servico.cadastrar');
    Route::post('/servico/excluir', [App\Http\Controllers\ServicoController::class, 'excluir'])->name('servico.excluir');

//PEÇAS AVULSAS
    Route::get('/peca/json', [App\Http\Controllers\PecaAvulsaController::class, 'pecaJson'])->name('peca.json');

//TIPOS DE PAGAMENTOS
    Route::get('/tipopagamentos/formas/json', [App\Http\Controllers\TipoPagamentoController::class, 'formas'])->name('tipo.formas.json');
    Route::get('/forma', [App\Http\Controllers\TipoPagamentoController::class, 'forma'])->name('forma.json');


    Route::get('/contrato/abrir/{token}/{id}', [App\Http\Controllers\ContratoController::class, 'abrir'])->name('contrato.abrir');


    View::composer(['admin.contatos.formulario','admin.contatos.tabela','admin.clientes.formulario-modal','admin.clientes.includes.form'],function($view){
        $view->with(['aplicativos'=>AppContato::all()]);

    });
    View::composer(['admin.veiculos.includes.form','front.orcamento02'],function($view){
        $view->with(['montadoras'    =>  Montadora::all()]);
        $view->with(['cores'         =>  Veiculo::$cores]);
    });
    View::composer(['admin.status.formulario'],function($view){
        $view->with(['todos_status'        =>\App\Models\Status::all()]);
    });
    View::composer(['admin.contratos.includes.nota'],function($view){
        $view->with(['tipos_notas'        =>\App\Models\TipoNota::all()]);
    });
    View::composer(['admin.index'],function($view){
        $conf   =   Configuracao::find(1);
        $view->with(['nome_empresa'        =>$conf->nome_principal,
            'contratos_nao_visualizados'=>Contrato::where('visualizado',0)->get()]);
    });
    View::composer(['admin.grupos.formulario'],function($view){
        $permissoes     =   \App\Models\Permissao::all();


        $view->with(['permissoes'=>$permissoes]);
    });
    View::composer(['admin.usuarios.formulario'],function($view){
        $grupos     =   \App\Models\Grupo::all();

        $view->with(['grupos'=>$grupos]);
    });

    View::composer(['admin.contratos.includes.invoicePDF'],function($view){
        $conf     =   Configuracao::find(1);

        $view->with(['conf'=>$conf]);
    });

    View::composer(['admin.entradas.formulario'],function($view){
        $conf       =   Configuracao::all()->last();
        $tipo       =   TipoPagamento::find(FormaPagamento::find($conf->forma_pagamento_preferido)->tipo_id);
        $view->with([
            'tipos'                     =>\App\Models\TipoPagamento::all(),
            'forma_pagamento_preferida' =>   $conf->forma_pagamento_preferido,
            'formas'                    =>  $tipo->formas,
            'tipo_pagamento_preferido'  =>  $tipo->id
        ]);
    });
});

Route::get('/teste',function () {
    return Configuracao::all()->last();


});

Route::get('teste-api',function () {
    return env('URL_EVOLUTIONAPI');
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_PORT => "8081",
        CURLOPT_URL => env('URL_EVOLUTIONAPI')."chat/whatsappNumbers/".env('INSTANCE_EVOLUTIONAPI'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"numbers\": [\n    \"+5585987067785\"\n  ]\n}",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "apikey: ".env('KEY_EVOLUTIONAPI')
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
});
Route::get('/pdf',function (){


  $pdf = Pdf::loadView('admin.contratos.includes.invoicePDF',['contrato'=>Contrato::find(1),'titulo'=>'Garantia','conf'=>Configuracao::find(1)->first()]);

    $pdf->setPaper('A4', 'portrait');

    return $pdf->stream('invoice.pdf');
//    Pdf::loadView('admin.contratos.includes.invoicePDF',['contrato'=>Contrato::find(1),'conf'=>$this->conf,'titulo'=>'Garantia'])->save($caminho);

});
Route::get('/',[SiteController::class,'index','index'])->name('site.index');
Route::get('/link-orcamento/{numero}', [App\Http\Controllers\Front\SiteController::class, 'enviarLinkOrcamento'])->name('site.enviar.link.orcamento');
Route::get('/fazer-orcamento', [App\Http\Controllers\Front\SiteController::class, 'orcamento'])->name('site.orcamento');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/logar', [App\Http\Controllers\LoginController::class, 'logar'])->name('logar');
Route::post('/cadastrar-pedido-orcamento', [App\Http\Controllers\Front\SiteController::class, 'cadastrarPedidoOrcamento'])->name('site.cadastrar.orcamento');
Route::get('/sair', [App\Http\Controllers\LoginController::class, 'logout'])->name('site.sair');




