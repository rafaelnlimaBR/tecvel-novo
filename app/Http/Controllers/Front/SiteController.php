<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Token;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{


    public function index(){
        $curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://evolutionapi-evolution-api.lllv17.easypanel.host/message/sendText/tecvel",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"text\": \"teste 2\",\n  \"number\": \"5585987067785\"\n}",
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "apikey: 429683C4C977415CAAFCCE10F7D57E11"
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
    }

    public function home(){

    }

    public function contrato($token,$id)
    {
        try{
            $dados = [
                'titulo' => "Garantia",
            ];

            $contrato   =   Contrato::find($id);
            if(is_null($contrato)){
                return "Contrato inexistente";
            }

            $contrato->validarToken($token);

            return view('front.contrato', $dados)->with('contrato', $contrato);




        }catch (\Exception $e){
            return view('front.contrato', $dados)->with('alerta',['tipo'=>'danger','icon'=>'','texto'=>$e->getMessage()]);

        }



    }
}
