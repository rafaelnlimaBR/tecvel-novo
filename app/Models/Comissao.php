<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comissao extends Model
{
    use HasFactory;
    protected $table = 'comissoes';

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function saidas()
    {
        return $this->belongsToMany(Saida::class,'saida_comissao');
    }
}
