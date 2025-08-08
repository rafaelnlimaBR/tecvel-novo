<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $fillable = ['placa'];
    public static $cores =   [
        ['id'=>'branco','nome'=>'Branco'],
        ['id'=>'prata','nome'=>'Prata'],
        ['id'=>'cinza','nome'=>'Cinza'],
        ['id'=>'preto','nome'=>'Preto'],
        ['id'=>'vermelho','nome'=>'Vermelho'],
        ['id'=>'amarelo','nome'=>'Amarelo'],
        ['id'=>'vinho','nome'=>'Vinho'],
        ['id'=>'azul','nome'=>'Azul'],
        ['id'=>'verde','nome'=>'Verde'],
        ['id'=>'laranja','nome'=>'Laranja'],

    ];

    public function scopePesquisarPorPlaca($query,$placa)
    {
        return $query->where('placa','like','%'.$placa.'%');
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }


    public function gravar($placa,Modelo $modelo,$ano,$cor)
    {
        $this->placa = strtoupper($placa);
        $this->modelo()->associate($modelo);
        $this->ano  = $ano;
        $this->cor   = $cor;
        if($this->save()){
            return $this;
        }
        return null;
    }

    public function excluir()
    {
        foreach ($this->contratos as $contrato) {
            $contrato->excluir();
        }
        return $this->delete();
    }
}
