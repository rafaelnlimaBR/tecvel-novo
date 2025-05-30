<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaoObra extends Model
{
    use HasFactory;

    protected $table    =   "historico_servico";

    public function historico()
    {
        return $this->belongsTo(Historico::class,'historico_id','id');
    }

}
