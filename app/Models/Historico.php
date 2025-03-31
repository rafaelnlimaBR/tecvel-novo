<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    protected $table    =   "historicos";

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class)->withPivot('valor','data','cobrar','id','desconto','valor_liquido')->withTimestamps();
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function pecas()
    {
        return $this->belongsToMany(PecaAvulsa::class,'historico_peca','historico_id','peca_id')->withPivot('id','valor','cobrar','marca','qnt','desconto','valor_liquido','valor_total')->withTimestamps();
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    public function comissoes()
    {
        return  $this->hasMany(Comissao::class);
    }

}
