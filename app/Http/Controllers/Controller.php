<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function carregarDadosAjax()
    {
        $totalNovosPedidosOrcamento =   0;
        foreach (Contrato::all() as $contrato) {
            $totalNovosPedidosOrcamento += $contrato->novoPedidoOrcamento();
        }




        $dados      =   ['novoPedidosOrcamento'=>$totalNovosPedidosOrcamento,
            ];
        return response()->json($dados);
    }
}
