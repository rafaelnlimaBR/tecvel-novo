<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $table    =   'contratos';
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }

    public function status()
    {
        return $this->belongsToMany(Status::class,'historicos','contrato_id','status_id')->withPivot('obs','data')->withTimestamps();
    }

    public function scopePesquisarPorCliente($query, $nome)
    {
        return $query->whereHas('cliente', function ($query) use ($nome) {
            $query->where('nome', 'like','%'.$nome.'%');
        });
    }

    public function scopePesquisarPorPlaca($query, $placa)
    {
        return $query->whereHas('veiculo', function ($query) use ($placa) {
            $query->where('placa', 'like','%'.$placa.'%');
        });
    }

    public function scopePesquisarPorTelefone($query, $telefone)
    {
        return $query->whereHas('cliente', function ($query) use ($telefone) {
            $query->whereHas('contatos', function ($query) use ($telefone){
                $query->where('numero', 'like','%'.$telefone.'%');
            });
        });
    }

}
