<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Token;
use App\Models\Whatsapp;
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

        return view('front.orcamento',$dados);

    }
}
