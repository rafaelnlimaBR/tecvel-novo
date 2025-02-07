@extends('admin.index')
@section('conteudo')


{{-- VARIAVEIS PASSADAS POR PARAMETRO AO CHAMAR ESSE FORMULARIO    routeAaction:routeUpdate:routeBack:valorTotal--}}
    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4">
            <div class="card ">
                <div class="card-body">
                    <form action="{{ isset($entrada)?$routeUpdate :$routeAction}}" method="POST">
                        {{ csrf_field() }}
                        @if(isset($entrada))
                            <input hidden type="text" class="form-control" id="id-entrada" placeholder="" name="id" value="{{$entrada->id}}">
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="tipo">Tipo Pagamento</label>
                                <select class="form-control" name="tipo" id="tipos_pagamentos">
                                    @foreach($tipos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->nome}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="forma">Forma de Pagamento</label>
                                <select class="form-control" name="forma" id="forma-pagamentos">
                                    <option value="0">CPNJ</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="forma">Repasse</label>
                                <input type="checkbox" class="form-control" name="repassar" checked >
                            </div>


                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <label for="taxa">Taxa</label>
                                <input class="form-control" type="text" id="taxa" value="0" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="forma">Valor</label>
                                <input type="text" class="form-control" name="valor" value="{{$valor}}" id="valor">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="forma">Valor Com Taxa</label>
                                <input type="text" class="form-control" name="valor" value="" id="valor-com-taxa" disabled>
                            </div>

                        </div>
                        <div class="form-row">

                        </div>
                        <div class="form-row">


                        </div>
                        @if(isset($entrada))
                            <button type="submit" class="btn btn-warning">Editar</button>
                        @else
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        @endif
                        <a href="{{$routeBack}}" class="btn btn-secondary">Voltar</a>


                    </form>
                </div>

            </div>
        </div>


    </div>


@stop
