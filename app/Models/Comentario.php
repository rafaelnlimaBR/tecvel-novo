<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentarios';


    public function postagem()
    {
        return $this->belongsToMany(Postagem::class, 'comentario_postagem', 'comentario_id', 'postagem_id');

    }

    public function respostas()
    {
        return $this->belongsToMany(Comentario::class, 'comentario_comentario', 'comentario_id', 'resposta_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function cadastrar(String $texto,bool $ativo, Postagem $postagem = null,Cliente $cliente = null,)
    {
        $this->descricao        =   $texto;
        $this->ativo            =   $ativo;

        if($cliente != null){
            $this->cliente_id = $cliente->id;
        }
        $this->save();
        if($postagem != null){
            $this->postagem()->sync($postagem);
        }

        return $this;
    }

    public function resposta(Comentario $resposta)
    {
        return $this->respostas()->attach($resposta);
    }


    public function excluir()
    {
        return $this->delete();
    }
}
