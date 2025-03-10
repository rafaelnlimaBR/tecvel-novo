<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PecaAvulsa extends Model
{
    use HasFactory;

    protected $table    =   "pecas_avulsas";

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }
}
