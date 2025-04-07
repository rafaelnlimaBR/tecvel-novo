<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    use HasFactory;
    protected $table = 'saidas';

    protected $fillable = ['valor', 'data'];

    public function salvar($valor, $data,$observacao)
    {
        $saida = new Saida();
        $saida->valor  = $valor;
        $saida->data    = Carbon::parse($data)->format('Y-m-d');
        $saida->obs     = $observacao;

        $saida->save();

        return $saida;
    }

    public function atualizar($id,$valor, $data,$observacao)
    {
        $saida          = Saida::find($id);
        $saida->valor   = $valor;
        $saida->data    = Carbon::parse($data)->format('Y-m-d');
        $saida->obs     = $observacao;
        $saida->save();
        return $saida;
    }
}
