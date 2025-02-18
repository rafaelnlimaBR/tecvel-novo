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
        return $this->belongsToMany(Servico::class)->withPivot('valor','data','cobrar','id')->withTimestamps();
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function pecas()
    {
        return $this->belongsToMany(PecaAvulsa::class,'historico_peca','historico_id','peca_id')->withPivot('id','valor','cobrar','marca')->withTimestamps();
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

}
