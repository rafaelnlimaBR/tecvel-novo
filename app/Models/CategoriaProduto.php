<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    use HasFactory;

    protected $table = 'categorias_produtos';
    public function scopePesquisarPorNome($query, $nome){
        return $query->where('nome','like','%'.$nome.'%');
    }
}
