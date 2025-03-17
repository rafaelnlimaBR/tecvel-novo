<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

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
        return $resposta;
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
        return $resposta;

       /* $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_PORT => "8081",
            CURLOPT_URL => "http://104.251.210.46:8081/message/sendMedia/tecvel",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"mediatype\": \"document\",\n  \"delay\": 2,\n  \"number\": \"$telefone\",\n  \"media\": \"C:\xampp\htdocs\tecvel-novo\public\invoice/1.pdf\",\n  \"mimetype\": \"\",\n  \"caption\": \"Caption\",\n  \"fileName\": \"fileName\"\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "apikey: mmcVlmdaaGljY9s8NfH7wEde3HQMQtHg"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }*/
    }



}
