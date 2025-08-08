<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Montadora extends Model
{
    use HasFactory;

    public function scopePesquisarPorNome($query, $nome){
        return $query->where('nome','like','%'.$nome.'%');
    }



    public function modelos()
    {
        return $this->hasMany(Modelo::class)->orderBy('nome','asc');

    }



}

