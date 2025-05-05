@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-5 col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($cliente)? route('cliente.atualizar',['cliente'=>$cliente]):route('cliente.cadastrar') }}" method="POST">
                    @include('admin.clientes.includes.form')

                    <a href="{{route('cliente.index')}}" class="btn btn-secondary">Voltar</a>


                </form>
            </div>

        </div>
    </div>
    @if (isset($cliente))
    <div class="col-lg-7 col-sm-12 col-md-12">
        @include('admin.contatos.formulario',['route_action'=>route('cliente.adicionar.contato'),'id'=>$cliente->id,'contatos'=>$cliente->contatos,'route_update'=>route('cliente.atualizar.contato'),"route_delete"=>route('cliente.excluir.contato')])
    </div>
    @endif

</div>

@stop
