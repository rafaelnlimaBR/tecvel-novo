<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Scalar\String_;

class Carousel extends Model
{
    use HasFactory;
    protected $table = 'carousel';


    public function cadastrar(String $titulo,String $texto ,int $equencia ,bool $ativo, string $imagem,bool  $temLink ,string  $link = null,string $alt = null)
    {
        $this->titulo   = $titulo;
        $this->texto    = $texto;
        $this->ativo    = $ativo;
        $this->sequencia    = $equencia;

            $this->imagem   = $imagem;
        $this->alt  = $alt;
        $this->tem_link =   $temLink;
        $this->link= $link;


        return $this->save();
    }
}
