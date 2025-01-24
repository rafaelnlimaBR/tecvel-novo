<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table    =   "servicos";

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }

    public function historicos()
    {
        return $this->belongsToMany(Historico::class,'historico_servico','historico_id',"servico_id")->withPivot('id','valor','data')->withTimestamps();
    }
}
