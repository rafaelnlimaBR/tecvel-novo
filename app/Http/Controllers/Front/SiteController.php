<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Token;
use App\Models\Whatsapp;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        try{
            $cliente                    =   new Cliente();
            $cliente->nome              =   $request->input('nome');
            $cliente->email             =   $request->input('email');



            return $request->all();


        }catch (\Exception $e){
            return \redirect()->route('site.orcamento')->with('alertas',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);
        }
    }
}
