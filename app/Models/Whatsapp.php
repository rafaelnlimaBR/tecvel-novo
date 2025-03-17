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
            $resposta   =   json_encode($resposta);
            $mensagem   = $resposta->response->message;
            return $mensagem;
            throw new \Exception($mensagem);
        }
        return true;
    }

    public function enivarMensagemMedia($url,$telefone)
    {
        $resposta   =   Http::withHeaders([
            'Content-Type'  =>  'application/json',
            'apikey'       => env('KEY_EVOLUTIONAPI'),
        ])->post('http://104.251.210.46:8081/message/sendMedia/tecvel',[
            'mediatype' =>  'document',
            'media'     =>  $url,
            'delay'     =>  2,
            'number'    =>  $telefone,
            'caption'   =>  'Garantia',
            'fileName'  =>  'garantia.pdf',

        ]);


        if($resposta->failed()){

            $resposta   =   json_decode($resposta);

            $mensagem   = implode($resposta->response->message);

            throw new \Exception($mensagem);
        }
        return true;

    }



}
