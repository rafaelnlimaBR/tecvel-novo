<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table    =   "notas";


    public function historico()
    {
        return $this->belongsTo(Historico::class);
    }

    public function Imagens()
    {
        return $this->hasMany(ImagensNota::class);
    }

    public function tipo()
    {
        return $this->belongsTo(TipoNota::class,'tipo_nota_id');
    }


}
