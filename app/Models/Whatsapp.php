<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Symfony\Component\ErrorHandler\ThrowableUtils;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Whatsapp extends Model
{
    use HasFactory;
    private $key;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->key = env('KEY_EVOLUTIONAPI');
    }

    public function enviarMensagem($mensagem,$telefone){
        $resposta   =   Http::withHeaders([
            'Content-Type'  =>  'application/json',
            'apikey'       => env('KEY_EVOLUTIONAPI'),
        ])->post('http://104.251.210.46:8081/message/sendText/tecvel',[

            'delay'     =>  2,
            'number'    =>  $telefone,
            'text'      =>  $mensagem,

        ]);
        if($resposta->failed()){

            throw new \Exception('erro');
        }
        return true;
    }

    public function enivarMensagemMedia($url,$telefone,string$texto,string $nome_arquivo,int $delay)
    {
        $resposta   =   Http::withHeaders([
            'Content-Type'  =>  'application/json',
            'apikey'       => env('KEY_EVOLUTIONAPI'),
        ])->post('http://104.251.210.46:8081/message/sendMedia/tecvel',[
            'mediatype' =>  'document',
            'media'     =>  $url,
            'delay'     =>  $delay,
            'number'    =>  '55'.$telefone,
            'caption'   =>  $texto,
            'fileName'  =>  $nome_arquivo,

        ]);


        if($resposta->failed()){

            $resposta =   $resposta->json();


//            $mensagem   =(string) "Status : ".$resposta['status'].". Erro : ".$resposta['error'].". Mensagem : ".$resposta['response']['message'];
            $mensagem   =   "Status : ".$resposta['status']."<br> Error : ".$resposta['error'];
            throw new \Exception($mensagem);
        }
        return true;

    }



}
