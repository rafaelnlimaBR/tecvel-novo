<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = ['nome'];

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }
    public function scopePesquisarPorEmail($query, $email)
    {
        return $query->where('email','like','%'.$email.'%');
    }
    public function scopePesquisarPorTelefone($query, $telefone)
    {

            return $query->whereHas('contatos', function ($query) use ($telefone) {

                    $query->where('numero', 'like','%'.$telefone.'%');


            });

    }

    public function contatos()
    {
        return $this->belongsToMany(Contato::class)->withPivot('responsavel')->withTimestamps();
    }

}
