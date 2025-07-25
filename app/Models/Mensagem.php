<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;
    protected $table = 'mensagens';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function visializar()
    {
        $this->visto    =   true;
        $this->save();
    }

    public function cadastrar(Cliente $cliente,string $mensagem)
    {
        $this->cliente()->associate($cliente);
        $this->texto        =   $mensagem;
        $this->visto        =   false;
        $this->save();
        return $this;
    }

    public function excluir()
    {
        return $this->delete();
    }
}
