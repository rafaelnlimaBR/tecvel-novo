<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    public static $cores =   [
        ['id'=>'branco','nome'=>'Branco'],
        ['id'=>'prata','nome'=>'Prata'],
        ['id'=>'cinza','nome'=>'Cinza'],
        ['id'=>'preto','nome'=>'Preto'],
        ['id'=>'vermelho','nome'=>'Vermelho'],
        ['id'=>'amarelo','nome'=>'Amarelo'],
        ['id'=>'vinho','nome'=>'Vinho'],
    ];

    public function scopePesquisarPorPlaca($query,$placa)
    {
        return $query->where('placa','like','%'.$placa.'%');
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }


}
