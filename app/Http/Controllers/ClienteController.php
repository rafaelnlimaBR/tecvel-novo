<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index (){
        $dados = [
            'titulo' => "Clientes",
            'titulo_tabela' => "Lista de Clientes"
        ];
        $clientes   =   Cliente::all();
        return view('admin.clientes.index',$dados)->with('clientes',$clientes);
    }
}
