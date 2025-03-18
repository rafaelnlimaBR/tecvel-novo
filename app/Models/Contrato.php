<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contrato extends Model
{
    use HasFactory;
    protected $table    =   'contratos';
    private $config     ;

    public function __construct()
    {
        $this->config     =   Configuracao::all()->last();
    }



    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function entrada()
    {
        return $this->belongsToMany(Entrada::class,'contrato_entrada','contrato_id','entrada_id')->withTimestamps();
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }

    public function status()
    {
        return $this->belongsToMany(Status::class,'historicos','contrato_id','status_id')->withPivot('obs','data','id')->withTimestamps();
    }

    public function entradas()
    {
        return $this->belongsToMany(Entrada::class,'contrato_entrada');
    }



    public function scopePesquisarPorCliente($query, $nome)
    {


            return $query->whereHas('cliente', function ($query) use ($nome) {
                $query->where('nome', 'like','%'.$nome.'%');
            });

    }

    public function scopePesquisarPorPlaca($query, $placa)
    {
        return $query->whereHas('veiculo', function ($query) use ($placa) {
            $query->where('placa', 'like','%'.$placa.'%');
        });
    }

    public function scopePesquisarPorTelefone($query, $telefone)
    {
        return $query->whereHas('cliente', function ($query) use ($telefone) {
            $query->whereHas('contatos', function ($query) use ($telefone){
                $query->where('numero', 'like','%'.$telefone.'%');
            });
        });
    }

    public function valorTotal()
    {
        return $this->totalServicosLiquido()+$this->totalPecasAvulsasLiquido();
    }

    public function somaTotalServicos()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->servicos as $servico){
                if($servico->pivot->cobrar == true){
                  $total += $servico->pivot->valor;
                }
            }

        }

        return $total;
    }

    public function totalServicosLiquido()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->servicos as $servico){
                    $total += $servico->pivot->valor_liquido;
            }
        }
        return $total;
    }

    public function somaTotalPecasAvulsas()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->pecas as $peca){

                    $total += $peca->pivot->valor;

            }

        }
        return $total;
    }

    public function totalPecasAvulsasLiquido()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->pecas as $peca){

                    $total += $peca->pivot->valor_liquido;

            }

        }

        return $total;
    }

    public function verificarPagamento()
    {
        $totalPago      =   $this->entradas->sum('valor');
        $totalContrato  =   $this->valorTotal();

        if ($totalPago == $totalContrato){
            return 1;//pago
        }elseif ($totalPago > $totalContrato){
            return 2;//super faturado
        }else{
            return 0;//pendente
        }
    }

    public function restantePagamento()
    {
        $totalPago      =   $this->entradas->sum('valor');
        $totalContrato  =   $this->valorTotal();

        return $totalContrato - $totalPago;
    }

}
