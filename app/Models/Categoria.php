<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'id';


    public function scopePesquisarPorNome($query, $nome){
        return $query->where('nome','like','%'.$nome.'%');
    }


    public function postagensMaisVistas()
    {
        return $this->belongsToMany(Postagem::class, 'categoria_postagem', 'categoria_id', 'postagem_id')->where('ativo','1')->orderBy('visitas','desc');
    }

    public function postagensMenosVistas()
    {
        return $this->belongsToMany(Postagem::class, 'categoria_postagem', 'categoria_id', 'postagem_id')->where('ativo','1')->orderBy('visitas','asc');
    }

    public function postagensMaisRecentes()
    {
        return $this->belongsToMany(Postagem::class, 'categoria_postagem', 'categoria_id', 'postagem_id')->where('ativo','1')->orderBy('updated_at','desc');
    }

    public function postagensMenosRecentes()
    {
        return $this->belongsToMany(Postagem::class, 'categoria_postagem', 'categoria_id', 'postagem_id')->where('ativo','1')->orderBy('updated_at','asc');
    }

    public function postagensAtivas(){
        return $this->belongsToMany(Postagem::class, 'categoria_postagem', 'categoria_id', 'postagem_id')->where('ativo','1');
    }

    public function postagens()
    {
        return $this->belongsToMany(Postagem::class,'categoria_postagem','categoria_id','postagem_id');
    }


    public function cadastrar(String $nome)
    {
        $this->nome     =   $nome;

        return $this->save();
    }

    public function excluir()
    {
        return $this->delete();
    }

}
