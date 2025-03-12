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

    public function validarToken($token)
    {
        $contrato   =   $this;

        if(!$contrato->tokens()->where('token',$token)->exists()){
            throw new \Exception("Token inexistente");
        }
        if($contrato->tokens()->where('token',$token)->first()->data_vencimento < \Carbon\Carbon::now()){
            throw new \Exception("Token expirado");
        }
        return true;
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

    public function tokens()
    {
        return $this->belongsToMany(Token::class,'contrato_token','contrato_id','token_id')->withTimestamps();
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
                if($servico->pivot->cobrar == true){
                    $total += $servico->pivot->valor_liquido;
                }
            }

        }

        return $total;
    }

    public function somaTotalPecasAvulsas()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->pecas as $peca){
                if($peca->pivot->cobrar == true){
                    $total += $peca->pivot->valor;
                }
            }

        }

        return $total;
    }

    public function totalPecasAvulsasLiquido()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->pecas as $peca){
                if($peca->pivot->cobrar == true){
                    $total += $peca->pivot->valor_liquido;
                }
            }

        }

        return $total;
    }

    public function getToken()
    {
        $contrato   =   $this;
        $token      =   "";
        if($contrato->tokens->count() == 0){
            $token  =   new \App\Models\Token();
            $token->token       =   Str::random(50);
            $token->dias_expirar    =   $this->config->dias_expirar_token;
            $token->data_vencimento =   \Carbon\Carbon::now()->addDays($this->config->dias_expirar_token);
            if($token->save()){
                $contrato->tokens()->save($token);
                $token  =   $contrato->tokens->last();
            }

        }else{
            $resultado  =   $contrato->tokens->last()->data_vencimento <= \Carbon\Carbon::now();

            if($resultado){
                $dias       =   $this->config->dias_expirar_token;;
                $token  =   new \App\Models\Token();
                $token->token       =   Str::random(50);
                $token->dias_expirar    =   $dias;
                $token->data_vencimento =   \Carbon\Carbon::now()->addDays($dias);

                if($token->save()){
                    $contrato->tokens()->save($token);
                    $token  =   $contrato->tokens->last();
                }

            }else{

                $token  =   $contrato->tokens->last();
            }
        }
        return $token;
    }


}
