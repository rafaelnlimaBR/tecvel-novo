<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Configuracao;
use App\Models\Contato;
use App\Models\Contrato;
use App\Models\ImagensNota;
use App\Models\Nota;
use App\Models\Status;
use App\Models\Token;
use App\Models\Veiculo;
use App\Models\Whatsapp;
use Carbon\Carbon;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class SiteController extends Controller
{

    public function teste($telefone,$mensagem){


        $whatsapp       =   new Whatsapp();
        $whatsapp->enviarMensagem($mensagem,$telefone);



    }


    public function index(){


    }

    public function home(){

    }

    public function orcamento()
    {

        $dados  =   [
            'titulo'        =>  'Orçamento'
        ];

        return \view('front.orcamento');

    }

    public function cadastrarPedidoOrcamento(Request $request)
    {
        /*try{*/
            $cpfCnpj                    =   str_replace(['.',',','/','-'],'',$request->input('cpfcnpj'));
            $telefone                   =   str_replace(['(',')'],'',$request->input('telefone'));
            $cliente                    =   Cliente::where(['cpfcnpj'=>$cpfCnpj]);
            if(!$cliente->exists()){
                $cliente                    =   new Cliente();
                $cliente->nome              =   $request->input('nome');
                $cliente->email             =   $request->input('email');
                $cliente->cpfcnpj           =   $cpfCnpj;
                $cliente->cep               =   $request->input('cep');
                $cliente->endereco          =   $request->input('endereco');
                $cliente->numero             =   $request->input('numero');
                $cliente->bairro             =   $request->input('bairro');
                $cliente->cidade             =   $request->input('cidade');
                $cliente->estado             =   $request->input('estado');
                $cliente->save();
            }else{
                $cliente=$cliente->first();
            }


            if(!$cliente->PesquisarPorTelefone($telefone)->exists()){
                $contato = ContatoController::cadastrar($telefone,Configuracao::first()->whatsapp_id);
                $cliente->contatos()->attach($contato);
            }





            $veiculo                    =   Veiculo::where(['placa'=>$request->get('placa')]);
            if(!$veiculo->exists()){
                $veiculo                    =   new Veiculo();
                $veiculo->placa             =   $request->input('placa');
                $veiculo->modelo_id         =   $request->input('modelo');
                $veiculo->cor               =   $request->input('cor');
                $veiculo->ano               =   $request->input('ano');
                $veiculo->save();
            }else{
                $veiculo=$veiculo->first();
            }




            $contrato                       =   new Contrato();
            $contrato->cliente_id           =   $cliente->id;
            $contrato->veiculo_id           =   $veiculo->id;
            $contrato->defeito              =   "";
            $contrato->solucao              =   "";
            $contrato->pedido_orcamento         =   true;
            $contrato->visualizado              =   false;


            if($contrato->save()) {
                $status = Status::find(Configuracao::first()->abertura);
                $contrato->status()->attach($status, ['obs' => 'Criado através de link para solicitação de orçamento', 'data' => Carbon::now()->format('Y-m-d')]);
                $nota                   =   new Nota();
                $nota->texto            =   $request->input('descricao');
                $nota->historico_id     =   $contrato->historicos->last()->id;
                $nota->tipo_nota_id          =   Configuracao::first()->solicitação_orcamento;
                $nota->save();

                if($request->hasFile('imagens')){



                $contrato   =   $nota->historico->contrato;

                    foreach($request->file('imagens') as $i=> $image){
                        if (!file_exists(public_path('/images/notas/'))){
                            mkdir(public_path('/images/notas/'), 0777, true);
                        }
                        $filename="";
                        $filename = $request->get('id').'-'.Str::random(16).'.'.$image->getClientOriginalExtension();

                        $resize  =  Image::read($image)->resize($nota->tipo->width_imagem,$nota->tipo->height_imagem);
                        $resize->save(public_path('/images/notas/').$filename);
                        $img                =   new ImagensNota();
                        $img->nota_id       =   $nota->id;
                        $img->nome          =   $filename;
                        $img->save();

                    }
                }

            }

            $zap    =   new Whatsapp();
             return $zap->enviarMensagem('Solicitação de orçamento criado com sucesso. Em breve você receberá um retorno com seu orçamento. Número de identificação do orçamento: '.$contrato->id,$telefone,'55');

            return Contrato::all();




        /*}catch (\Exception $e){
            return $e->getMessage();
//            return \redirect()->route('site.orcamento')->with('alertas',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }*/
    }
}
