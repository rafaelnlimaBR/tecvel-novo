<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class, 'grupo_permissao', 'grupo_id', 'permissao_id');
    }

}
