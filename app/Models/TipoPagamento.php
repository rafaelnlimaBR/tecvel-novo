<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    use HasFactory;
    protected $table    =   "tipos_pagamentos";

    public function formas()
    {
        return $this->hasMany(FormaPagamento::class,'tipo_id');
    }
}
