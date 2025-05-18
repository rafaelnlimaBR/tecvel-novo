<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComissaoRequest;
use App\Models\Avulsa;
use App\Models\Comissao;
use App\Models\Configuracao;
use App\Models\Entrada;
use App\Models\FormaPagamento;
use App\Models\HistoricoPeca;
use App\Models\MaoObra;
use App\Models\Montadora;
use App\Models\Contrato;
use App\Models\Historico;
use App\Models\PecaAvulsa;
use App\Models\Servico;
use App\Models\Status;
use App\Models\TipoPagamento;

use App\Models\Whatsapp;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use function Symfony\Component\Mime\Header\all;
use function Symfony\Component\Mime\Header\get;

class ContratoController extends Controller
{
    var $conf   =   "";

    public function __construct()
    {
        $this->conf     =   Configuracao::all()->last();
    }

    public function index(Request $r){



        $dados = [
            'titulo' => "Contratos",
            'titulo_tabela' => "Lista de Contratos",
            'orcamento_id'  => $this->conf->abertura    ,//id do status orçamento
        ];

        if($r->has('placa')){
            $contratos   =   Contrato::PesquisarPorTelefone($r->input('telefone'))->
            orderBy('created_at', 'desc')
                ->paginate(10)->
                withQueryString();
        }else{
            $contratos   =   Contrato::pesquisarPorCliente($r->input('nome'))->PesquisarPorTelefone($r->input('telefone'))->PesquisarPorPlaca($r->input('placa'))->
            orderBy('created_at', 'desc')
                ->paginate(10)->
                withQueryString();
        }

        return view('admin.contratos.index',$dados)->with('contratos',$contratos);
    }

    public function editar($id,$historico_id){
        try {
            $contrato          =   Contrato::find($id);
            $historico          =    Historico::find($historico_id);

            if($contrato == null ){

                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Contrato não existe."]);
            }
            if($historico == null ){

                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Historico não existe."]);
            }
            if($contrato->historicos->contains($historico_id) == false){
                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Histórico não é desse contrato."]);
            }
            $contrato->visualizado = true;
            $contrato->save();

            $dados = [
                'titulo'        => "Editar Contrato",
                'contrato'        =>  $contrato,
                'historico'         => $historico
            ];



            return view('admin.contratos.formulario',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }
    }

    public function novo(){
        $dados = [
            'titulo'        => "Nova Contrato",
            'contratos'    =>  Montadora::all(),
            'pagina'        => 'dados'

        ];
        return view('admin.contratos.formulario',$dados);
    }

    public function visualizacao(Request $r,Contrato $contrato)
    {
        try {

            if($contrato == null ){

                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','icon'=>'','texto'=>"Contrato não existe."]);
            }


            $dados = [
                'titulo'        => "Visualizar Contrato",
                'contrato'        =>  $contrato,
            ];



            return view('admin.contratos.invoice',$dados);



        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);

        }


    }

    public function cadastrar(Request $r){
        try {

            $contrato                       =   new Contrato();
            $contrato->cliente_id           =   $r->get('cliente');
            $contrato->veiculo_id           =   $r->get('veiculo');
            $contrato->defeito              =   $r->get('defeito');
            $contrato->solucao              =   $r->get('solucao');
            $contrato->garantia             =   Carbon::createFromFormat('d/m/Y',$r->get('garantia'));
            $contrato->visualizado          =   true;


            if($contrato->save()){
                $status             =   Status::find(Configuracao::first()->abertura);
                $contrato->status()->attach($status,['obs'=>$r->get('obs'),'data'=>Carbon::now()->format('Y-m-d')]);
            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->status->last()->pivot->id,'pagina'=>'dados'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato cadastrado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function atualizar(Request $r){
        try {
            $contrato                       =   Contrato::find($r->get('id'));
            $contrato->cliente_id           =   $r->get('cliente');
            $contrato->veiculo_id           =   $r->get('veiculo');
            $contrato->defeito              =   $r->get('defeito');
            $contrato->solucao              =   $r->get('solucao');
            $contrato->garantia             =   Carbon::createFromFormat('d/m/Y',$r->get('garantia'));

            if($contrato->save()){
                return redirect()->route('contrato.editar',['id'=>$contrato->id,"historico_id"=>$r->get('id_historico'),'pagina'=>'dados'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);
            }


        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }



    public function excluir(Contrato $contrato){
        try{
            if(auth()->user()->cannot('contrato-excluir')){
                return redirect()->back()->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>'Acesso Negado']);
            }

            if($contrato->excluir()){
                return redirect()->route('contrato.index')->with('alerta',['tipo'=>'success','icon'=>'','texto'=>'Excluido com sucesso']);
            }

        }catch(\Throwable $th){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function mudarStatus(Request $r)
    {
        try {
            $contrato                       =   Contrato::find($r->get('id_contrato'));
            $contrato->status()->attach($r->get('id_status'),['obs'=>$r->get('obs'),'data'=>Carbon::now()->format('y-m-d')]);

            return redirect()->route('contrato.editar',['id'=>$contrato->id,"historico_id"=>$contrato->historicos->last()->id,'pagina'=>'dados'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Contrato atualizado com sucesso."]);



        } catch (\Throwable $th) {
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$th->getMessage()]);
        }
    }

    public function EditarComissao()
    {

    }





    public function adicionarServico(Request $r)
    {

        try {
            $historico_atual                =   $r->get('historico_id');
            $historico                      =   Historico::find($historico_atual);
            $cobrar                         =   $historico->status->cobrar;
            $contrato                       =    $historico->contrato;
            $historico->servicos()->attach($r->get('servico'),['valor'=>$r->get('valor'),'data'=>Carbon::now(),'cobrar'=>$cobrar,'desconto'=>0,'valor_liquido'=>$r->get('valor')]);

            return response()->json(['servico'=>view("admin.contratos.includes.tabela-servico",['contrato'=>$contrato,'historico'=>$historico])->render()]);

        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }
    }

    public function removerServico(Request $r)
    {
        try {
            $historico_id                   =   $r->get('historico_id');
            $servico_id                     =   $r->get('servico_id');
            $historico                      =   Historico::find($historico_id);
            $contrato                       =    $historico->contrato;
            $maoObra                        =   MaoObra::find($servico_id);

            if ($maoObra->delete()){
                return response()->json(['servico'=>view("admin.contratos.includes.tabela-servico",['contrato'=>$contrato,'historico'=>$historico])->render()]);
            }




        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }
    }

    public function atualizarServico(Request $r)
    {
        try {
//            return response()->json($r->all());
            $servico                =       MaoObra::find($r->get('servico_id'))   ;
            $servico->valor         =      $r->get('valor');
//            $servico->cobrar        =       ($r->get('cobrar')=="1"?true:false);
            $servico->cobrar        =       $servico->historico->status->cobrar;
            $servico->desconto      =       $r->get('desconto');
            $servico->valor_liquido =       $r->get('valor_liquido');
            $servico->data          =   Carbon::now();
            $historico              =   Historico::find($r->get('historico_id'));
            $contrato               =   $historico->contrato;

            if($servico->save()){
                return response()->json(['servico'=>view("admin.contratos.includes.tabela-servico",['contrato'=>$contrato,'historico'=>$historico])->render()]);
            }


        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }

    }

    public function adicionarPeca(Request $r)
    {

        try {

            $peca                           =   PecaAvulsa::where('nome',$r->get('peca'))->first();
            if($peca == null){
                $peca           =   new PecaAvulsa();
                $peca->nome     =   $r->get('peca');
                $peca->valor    =   $r->get('valor');
                if(!$peca->save()){
                    return response()->json(['erro'=>'Não foi possível cadastrar a peça nova.']);
                }
            }
            $historico                      =   Historico::find( $r->get('historico_id'));
            $contrato                       =   $historico->contrato;
            $desconto                       =   $r->get('desconto');
            $qnt                            =   $r->get('qnt');
            $valor                          =   $r->get('valor');
            $valor_total                    =   $qnt*$valor;
            $valor_liquido                  =   ((100-$desconto)/100)*$valor;
            $valor_liquido_total            =   $valor_liquido*$qnt;
            $cobrar                         =   0;
            if($r->has('cobrar')){
                $cobrar     =   $r->get('cobrar');
            }else{
                $cobrar     =   $contrato->status->last()->cobrar;
            }
            $historico->pecas()->attach($peca->id,['valor'=>$valor,'cobrar'=>$cobrar,'marca'=>$r->get('marca-peca'),'qnt'=>$r->get('qnt'),'desconto'=>$desconto,'valor_total'=>$valor_total,'valor_liquido'=>$valor_liquido,'valor_liquido_total'=>$valor_liquido_total]);

            return response()->json(['peca'=>view("admin.contratos.includes.tabela-pecas",['contrato'=>$contrato,'historico'=>$historico])->render()]);

        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }
    }

    public function removerPeca(Request $r)
    {
        try {
            $historico_id                   =   $r->get('historico_id');
            $peca_id                     =   $r->get('peca_id');
            $historico                      =   Historico::find($historico_id);
            $contrato                       =    $historico->contrato;
            $peca                           =   Avulsa::find($peca_id);

            if ($peca->delete()){
                return response()->json(['peca'=>view("admin.contratos.includes.tabela-pecas",['contrato'=>$contrato,'historico'=>$historico])->render()]);
            }




        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }
    }
    public function atualizarPeca(Request $r)
    {

        try {
            $peca                       =       Avulsa::find($r->get('peca_id'))   ;
            $peca->valor                =      $r->get('valor');
//            $peca->cobrar             =       ($r->get('cobrar')=="1"?true:false);
            $peca->cobrar               =      $peca->historico->status->cobrar;
            $peca->marca                =      $r->get('marca');
            $peca->qnt                  =      $r->get('qnt');
            $peca->valor_total          =      $r->get('valor_bruto_total');
            $peca->desconto             =       $r->get('desconto');
            $peca->valor_liquido        =      $r->get('valor_liquido');
            $peca->valor_liquido_total  = $r->get('valor_liquido_total');
            $historico                  =   Historico::find($r->get('historico_id'));
            $contrato                   =   $historico->contrato;

            if($peca->save()){
                return response()->json(['peca'=>view("admin.contratos.includes.tabela-pecas",['contrato'=>$contrato,'historico'=>$historico])->render()]);
            }


        } catch (\Throwable $th) {
            return response()->json(['erro'=>$th->getMessage()]);
        }

    }

    public function entrada($id)
    {

        $contrato   =   Contrato::find($id);

        $dados = [
            'titulo'        => "Pagamento",
            'valor'         =>  $contrato->restantePagamento(),
            'contrato'      => $contrato,
            'id'            => $contrato->id
        ];

        return view('admin.contratos.includes.entrada',$dados);
    }

    public function faturar(Request $r)
    {
        try{

            $contrato                       =   Contrato::find($r->get('id'));
            $entrada                        =   new Entrada();
            $entrada->valor                 =   $r->get('valor');
            $entrada->valor_liquido         =   $r->get('valor-liquido');
            $entrada->valor_acrescimo        =   $r->get('valor-taxa');
            $entrada->forma_pagamento_id    =   $r->get('forma');
            $entrada->taxa                  =   $r->get('taxa');
            $entrada->repassar_taxa         =   ($r->get('repassar') == 'on')?true:false;

            if ($entrada->save()){
                $contrato->entrada()->attach($entrada);
            }

            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'entradas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Pagamento registrado com sucesso"]);

        }catch (\Exception $e){

            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'entradas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);

        }
    }

    public function excluirEntrada(Request $r,$id,$entrada_id)
    {
        try{

            $contrato                       =   Contrato::find($id);
            $entrada                        =   Entrada::find($entrada_id);


            if ($entrada->delete()){

            }

            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'entradas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Pagamento excluir com sucesso"]);

        }catch (\Exception $e){

            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'entradas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);

        }
    }

    public function atualizarEntrada(Request $r)
    {
        try{

            $contrato                       =   Contrato::find($r->get('id'));
            $entrada                        =   Entrada::find($r->get('entrada_id'));
            $entrada->valor                 =   $r->get('valor');
            $entrada->valor_liquido         =   $r->get('valor-liquido');
            $entrada->valor_acrescimo        =   $r->get('valor-taxa');
            $entrada->forma_pagamento_id    =   $r->get('forma');
            $entrada->taxa                  =   $r->get('taxa');
            $entrada->repassar_taxa         =   ($r->get('repassar') == 'on')?true:false;

            if ($entrada->save()){

            }

            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'entradas'])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Pagamento atualizado com sucesso"]);

        }catch (\Exception $e){

            return redirect()->route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'entradas'])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);

        }
    }

    public function editarEntrada($id,$entrada_id)
    {

        $contrato   =   Contrato::find($id);
        $entrada =   Entrada::find($entrada_id);

        if($contrato == null or $entrada == null){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>'Contrato ou Pagamento não existem']);
        }
        $dados = [
            'titulo'        => "Pagamento",
            'valor'         =>  $contrato->somaTotalPecasAvulsas()+$contrato->somaTotalServicos(),
            'contrato'      => $contrato,
            'id'            => $contrato->id,
            'entrada'       => $entrada,
            'formas'        => TipoPagamento::find($entrada->forma->tipo->id)->formas
        ];

        return view('admin.contratos.includes.entrada',$dados);
    }




    public function enviarInvoiceAplicativos(Request $r,Contrato $contrato)
    {
        try{

            $alertas    =   $contrato->enviarInvoiceAplicativos();

            return redirect()->route('contrato.visualizacao',['contrato'=>$contrato])->with('alertas',$alertas);
        }catch (\Exception $e){
            return redirect()->route('contrato.visualizacao',['contrato'=>$contrato])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage() ]);
        }

    }

    public function enviarInvoiceEmail(Request $r,Contrato $contrato)
    {
        try{

            $contrato->enviarInvoiceEmail();

            return redirect()->route('contrato.visualizacao',['contrato'=>$contrato])->with('alerta',['tipo'=>'success','icon'=>'','texto'=>"Email: ".$contrato->cliente->email." - Enviado com sucesso"]);
        }catch (\Exception $exception){
            return redirect()->route('contrato.visualizacao',['contrato'=>$contrato])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$exception->getMessage()]);
        }
    }

    public function baixarPDF(Request $r,Contrato $contrato)
    {
        try{
            return $contrato->baixarPDF();


//            $url        =   URL::to($url.$filename);

        }catch (\Exception $exception){
            return redirect()->route('contrato.visualizacao',['contrato'=>$contrato])->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$exception->getMessage()]);
        }
    }
}
