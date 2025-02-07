<?php

namespace App\Http\Controllers;

use App\Models\TipoPagamento;
use Illuminate\Http\Request;

class TipoPagamentoController extends Controller
{

    public function formas(Request $r)
    {
        try{
            $tipos     =   TipoPagamento::find($r->get('id'));
            return response()->json($tipos->formas);
        }catch (\Exception $e){
            return response()->json(['erro'=>$e->getMessage()]);
        }

    }
}
