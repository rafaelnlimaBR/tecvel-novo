<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    use HasFactory;

    protected $table    =   "formas_pagamentos";

    public function tipo()
    {
        return $this->belongsTo(TipoPagamento::class,'tipo_id');
    }
}
