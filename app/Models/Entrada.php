<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $fillable =   ['valor_liquido','valor','valor_acrescimo'];
    public function forma()
    {
        return $this->belongsTo(FormaPagamento::class,'forma_pagamento_id');
    }
}
