<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

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
        return $this->belongsToMany(Status::class,'historicos','contrato_id','status_id')->withPivot('obs','data','id','tipo_id')->withTimestamps();
    }

    public function entradas()
    {
        return $this->belongsToMany(Entrada::class,'contrato_entrada');
    }

    public function comissoes()
    {

    }

    public function scopePesquisarPorCliente($query, $nome)
    {


            return $query->whereHas('cliente', function ($query) use ($nome) {
                $query->where('nome', 'like','%'.$nome.'%');
            });

    }

    public function todasNotas()
    {
        return $this->historicos->map->notas;
    }

    public function scopepedidosOrcamentosNaoVisualizados($query)
    {

        return $query->where('visualizado',0);

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

    public function novoPedidoOrcamento()
    {
        if($this->pedido_orcamento == 1 ){
            if($this->visualizado == 0){
                return true;
            }
        }
        return false;

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

    public function totalServicosBruto()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->servicos as $servico){
                $total += $servico->pivot->valor;
            }
        }
        return $total;
    }

    public function totalPecasLiquido()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->pecas as $peca){
                $total += $peca->pivot->valor_liquido*$peca->pivot->qnt;
            }
        }
        return $total;
    }

    public function totalPecasBruto()
    {
        $total  =   0;
        foreach ($this->historicos as $historico){
            foreach ($historico->pecas as $peca){
                $total += $peca->pivot->valor*$peca->pivot->qnt;
            }
        }
        return $total;
    }

    public function verificarPagamento()
    {
        $totalPago      =   $this->entradas->sum('valor');
        $totalContrato  =   $this->totalLiquido();

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
        $totalContrato  =   $this->totalLiquido();

        return $totalContrato - $totalPago;
    }

    public function totalLiquido()
    {
        return $this->totalPecasLiquido()+$this->totalServicosLiquido();
    }

    public function totalBruto()
    {
        return $this->totalPecasBruto()+$this->totalServicosBruto();
    }

    public function excluir()
    {
        foreach ($this->entradas as $entrada){
            $entrada->delete();
        }
        return $this->delete();
    }

    public function enviarInvoiceEmail()
    {
        $contrato       =   $this;
        $filename        =   $contrato->id."-".$contrato->cliente->id."-orçamento".".pdf";
        $caminho        = public_path('invoice/');
        if (!file_exists($caminho)){
            mkdir($caminho, 0777, true);
        }
        $caminho    =   $caminho.$filename;

        Pdf::loadView('admin.contratos.includes.invoicePDF',['contrato'=>$contrato,'titulo'=>'Garantia'])->save($caminho);

        Mail::to($contrato->cliente->email,$contrato->cliente->nome)->send(new \App\Mail\PedidoOrcamentoMail($contrato,$caminho));

        if(\File::exists($caminho)){
            \File::delete($caminho);
        }
        return true;

    }

    public function baixarPDF()
    {
        $contrato       =   $this;
        $filename   =   $contrato->id."-".$contrato->cliente->id."-orçamento".".pdf";


        $caminho = public_path('invoice/');

        if (!file_exists($caminho)){
            mkdir($caminho, 0777, true);
        }
        $caminho    =   $caminho.$filename;

        //        return $caminho;
        //        PDF::view('admin.contratos.includes.invoicePDF',['contrato'=>$contrato]);
        //        PDF::loadView('admin.contratos.includes.invoicePDF',$contrato)->save($caminho);

        return  Pdf::loadView('admin.contratos.includes.invoicePDF',['contrato'=>$contrato,'titulo'=>'Garantia'])->download($filename);
    }

    public function enviarInvoiceAplicativos()
    {
        $contrato       =   $this;
        $filename        =   $contrato->id."-".$contrato->cliente->id."-orçamento".".pdf";
        $caminho        = public_path('invoice/');
        if (!file_exists($caminho)){
            mkdir($caminho, 0777, true);
        }
        $caminho    =   $caminho.$filename;

        Pdf::loadView('admin.contratos.includes.invoicePDF',['contrato'=>$contrato,'titulo'=>'Garantia'])->save($caminho);

        $whatsapp    =   new Whatsapp();
        $alertas    =   [];
        foreach ($contrato->cliente->contatos as $key=>$contato){
            if($contato->app->id == Configuracao::all()->last()->whatsapp_id){

                if($whatsapp->checar($contato->numero,'+55')){
                    $resultado = $whatsapp->enivarMensagemMedia($caminho,$contato->numero,"Segue a garantia do servico realizado. Data da Garantia : ".Carbon::parse($contrato->garantia)->format('d/m/Y'),$filename,2,'+55',"document");
                    if($resultado == true){

                        $alertas[$key]    = ['resposta' => 'true',
                            'texto' => "Whatsapp : ".$contato->numero." - Enviado com sucesso",
                            'numero'=>$contato->numero,
                            'status'=>'',
                            'tipo'  =>'success'];
                    }else{
                        $alertas[$key]    = ['resposta' => 'false',
                            'texto' => "Whatsapp : ".$contato->numero." - Erro ao enviar a mensagem",
                            'numero'=>$contato->numero,
                            'status'=>'',
                            'tipo'  =>'danger'];
                    }
                }else{
                    $alertas[$key]    = ['resposta' => 'false',
                        'texto' => "Número : ".$contato->numero." - Não possui Whatsapp",
                        'numero'=>$contato->numero,
                        'status'=>'',
                        'tipo'  =>'warning'];
                }
            }
        }

        if(\File::exists($caminho)){
            \File::delete($caminho);
        }

        return $alertas;


    }



    private function salvarArquivo( string $nomeArquivo, string $caminho){

        return URL::to($caminho);
    }

}
