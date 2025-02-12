@extends('admin.index')
@section('conteudo')

@include("admin.entradas.formulario",[
            'routeAction'   =>  route('contrato.faturar'),
            'routeUpdate'   =>  route('contrato.atualizar.faturar'),
            'routeBack'     =>  Route('contrato.editar',['id'=>$contrato,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>"entradas"]),
        ])
@stop
