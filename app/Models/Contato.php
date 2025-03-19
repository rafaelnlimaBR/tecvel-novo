<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AppContato;
use Illuminate\Http\Request;

use App\Models\Contrato;
use Exception;

class Contato extends Model
{
    use HasFactory;
    protected $table    =   "contatos";
    protected $fillable  =  ["numero"];

    public function app(){
        return $this->belongsTo(AppContato::class);
    }

    public static function cadastrar($numero, $app_id){

        $contato                =   Contato::where(['numero'=>$numero]);
        if($contato->exists()){
            return $contato->first()->id;
        }else{
            $contato    =   new Contato();
        }
        $contato->numero        =   $numero;
        $contato->app_id        =   $app_id;
        if($contato->save()){
            return $contato->id;
        }

        return new Exception('Erro ao cadastrar Contato');

}


public static function atualizar($id,$numero, $app_id){




        $contato                =   Contato::where(['numero'=>$numero]);
        if($contato->exists()){
            $contato            =   $contato->first();

        }else{
            $contato            =   new Contato();
            $contato->numero    =   $numero;
        }




        $contato->app_id        =   $app_id;

        if($contato->save()){

            return $contato;
        }
        throw new Exception('Erro ao atualizar Contato');
}

}
