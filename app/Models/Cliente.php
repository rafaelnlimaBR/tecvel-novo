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

    public function __construct()
    {

    }

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

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function contatos()
    {
        return $this->belongsToMany(Contato::class)->withPivot('responsavel')->withTimestamps();
    }

    public function gravar($nome, $email, $cep, $endereco, $numero, $bairro, $cidade, $estado)
    {
        $this->nome             = $nome;
        $this->email             = $email;
        $this->endereco         = $endereco;
        $this->cep              = $cep;
        $this->numero           = $numero;
        $this->bairro            = $bairro;
        $this->cidade       = $cidade;
        $this->estado           = $estado;
        if($this->save()){
            return $this;
        }
        return null;
    }



    public function excluir()
    {
        foreach ($this->contratos as $contrato) {
            $contrato->excluir();
        }
        return $this->delete();
    }


}
