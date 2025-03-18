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

    public function enviarMensagem(string $mensagem,$telefone,$codigoPais){
        $resultado  =   [];
        $resposta   =   Http::withHeaders([
            'Content-Type'  =>  'application/json',
            'apikey'       => env('KEY_EVOLUTIONAPI'),
        ])->post('http://104.251.210.46:8081/message/sendText/tecvel',[

            'delay'     =>  2,
            'number'    =>  $codigoPais.$telefone,
            'text'      =>  $mensagem,

        ]);



        if($resposta->failed()){
            $resultado   =   ['resposta' => 'false',
                            'texto' => "Numero : ".$telefone." - Erro ao enviar a mensagem",
                            'numero'=>$telefone,
                            'status'=>$resposta->status(),
                            'tipo'  =>'danger'];


        }elseif ($resposta->successful()) {
            $resultado   =   ['resposta' => 'true',
                            'texto' => "Numero : ".$telefone." - Enviado com sucesso",
                            'numero'=>$telefone,
                            'status'=>$resposta->status(),
                            'tipo'  =>'success'];
        }

        return $resultado;

    }

    public function enivarMensagemMedia($url,$telefone,string$texto,string $nome_arquivo,int $delay,$codigoPais)
    {
        $resposta   =   Http::withHeaders([
            'Content-Type'  =>  'application/json',
            'apikey'       => env('KEY_EVOLUTIONAPI'),
        ])->post('http://104.251.210.46:8081/message/sendMedia/tecvel',[
            'mediatype' =>  'document',
            'media'     =>  $url,
            'delay'     =>  $delay,
            'number'    =>  $codigoPais.$telefone,
            'caption'   =>  $texto,
            'fileName'  =>  $nome_arquivo,

        ]);


        if($resposta->failed()){
            $resultado   =   ['resposta' => 'false',
                'texto' => "Numero : ".$telefone." - Erro ao enviar o documento",
                'numero'=>$telefone,
                'status'=>$resposta->status(),
                'tipo'  =>'danger'];


        }elseif ($resposta->successful()) {
            $resultado   =   ['resposta' => 'true',
                'texto' => "Numero : ".$telefone." - Enviado com sucesso",
                'numero'=>$telefone,
                'status'=>$resposta->status(),
                'tipo'  =>'success'];
        }
        return $resultado;
    }



}
