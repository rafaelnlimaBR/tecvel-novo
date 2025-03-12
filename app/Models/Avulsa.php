<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avulsa extends Model
{
    use HasFactory;
    protected $table    =   'historico_peca';


    public function historico()
    {
        return $this->belongsTo(Historico::class);
    }
}
