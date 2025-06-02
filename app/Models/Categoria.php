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
