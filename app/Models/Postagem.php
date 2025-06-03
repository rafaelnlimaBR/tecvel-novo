<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;
    protected $table = 'postagens';
    protected $primaryKey = 'id';

    public function usuario()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class,'categoria_postagem','postagem_id','categoria_id');
    }
    public function scopePesquisarPorTitulo($query, $titulo){
        return $query->where('titulo','like','%'.$titulo.'%');
    }

    public function cadastrar(String $titulo,String $texto, $imagem, String $alt, $ativo, User $usuario, $categorias,String $tags)
    {
        $this->titulo     =   $titulo;
        $this->descricao     =   $texto;
        $this->imagem     =   $imagem;
        $this->alt     =   $alt;
        $this->ativo     =   $ativo;
        $this->user_id  =   $usuario->id;
        $this->tags     =   $tags;

        $this->save();
        $this->categorias()->sync($categorias);

        return $this;

    }

    public function excluir()
    {
        return $this->delete();
    }
}
