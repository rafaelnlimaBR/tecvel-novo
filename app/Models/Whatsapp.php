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
    private $instance;
    private $url;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->key  =   env('KEY_EVOLUTIONAPI');
        $this->instance =   env('INSTANCE_EVOLUTIONAPI');
        $this->url    =   env('URL_EVOLUTIONAPI');
    }

    public function enviarMensagem(string $mensagem,$telefone,$codigoPais){
        $resultado  =   [];
        $resposta   =   Http::withHeaders([
            'Content-Type'  =>  'application/json',
            'apikey'       => $this->key,
        ])->post($this->url.'message/sendText/'.$this->instance,[


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
                            'texto' => "Numero : ".$telefone." - Mensagem enviado com sucesso",
                            'numero'=>$telefone,
                            'status'=>$resposta->status(),
                            'tipo'  =>'success'];
        }

        return $resultado;

    }

    public function enivarMensagemMedia($url,$telefone,$texto,string $nome_arquivo,int $delay,$codigoPais,$tipo)
    {
        $resposta   =   Http::withHeaders([
            'Content-Type'  =>  'application/json',
            'apikey'       => $this->key,
        ])->post($this->url.'message/sendMedia/'.$this->instance,[
            'mediatype' =>  $tipo,
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
                'texto' => "Numero : ".$telefone." - Arquivo enviado com sucesso",
                'numero'=>$telefone,
                'status'=>$resposta->status(),
                'tipo'  =>'success'];
        }
        return $resultado;
    }



}
