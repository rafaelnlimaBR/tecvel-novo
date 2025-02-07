@extends('admin.index')
@section('conteudo')


{{-- VARIAVEIS PASSADAS POR PARAMETRO AO CHAMAR ESSE FORMULARIO    routeAaction:routeUpdate:routeBack:valorTotal--}}
    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>

    <div class="row">
        <div class="col-lg-8 col-sm-8 col-md-8">
            <div class="card ">
                <div class="card-body">
                    <form action="{{ isset($entrada)?$routeUpdate :$routeAction}}" method="POST">
                        {{ csrf_field() }}
                        @if(isset($entrada))
                            <input hidden type="text" class="form-control" id="id-entrada" placeholder="" name="id" value="{{$entrada->id}}">
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="tipo">Tipo Pagamento</label>
                                <select class="form-control" name="tipo" id="tipos_pagamentos">
                                    @foreach($tipos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->nome}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="forma">Forma de Pagamento</label>
                                <select class="form-control" name="forma" id="forma-pagamentos">

                                </select>
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
