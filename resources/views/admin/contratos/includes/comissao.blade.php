@extends('admin.index')

@section('conteudo')

{{-- VARIAVEIS PASSADAS POR PARAMETRO AO CHAMAR ESSE FORMULARIO    routeAaction:routeUpdate:routeBack:valorTotal--}}
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-5 col-sm-5 col-md-5">
        <div class="card ">
            <div class="card-body">
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="fornecedor">Fornecedor <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fornecedorModal">
                                    Novo Fornecedor
                                </button></label>
                            <input class="form-control" type="text" id="fornecedor" value="" name="taxa" >
                        </div>

                        <div class="form-group col-md-3">
                            <label for="forma">Valor Liquido</label>
                            <input type="text" class="form-control dinheiro" name="valor-liquido" value="" id="valor-liquido" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="forma">Valor Com Taxa</label>
                            <input type="text" class="form-control dinheiro" name="valor-taxa" value="" id="valor-com-taxa" >
                        </div>

                    </div>



                    <div class="form-row">

                    </div>
                    <div class="form-row">


                    </div>
                    @if(isset($comissao))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$historico->id,'pagina'=>'comissao'])}}" class="btn btn-secondary">Voltar</a>


                </form>
            </div>

        </div>
    </div>


</div>
@include('admin.fornecedores.includes.formModal')
@stop
