<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    public function scopePesquisarPorNome($query, $nome){
        return $query->where('nome','like','%'.$nome.'%');
    }

    public function montadora()
    {
        return $this->belongsTo(Montadora::class);
    }

    public function gravar($nome, Montadora $montadora)
    {
        $this->nome         =   $nome;
        $this->montadora()->associate($montadora);

        if($this->save()){
            return $this;
        }
        return false;
    }

    public function excluir()
    {

            return $this->delete();

    }
}
