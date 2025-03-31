@extends('admin.index')

@section('conteudo')
    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <div class="card ">
                <div class="card-body">
                    @include('admin.fornecedores.includes.form',['modal'=>false])
                </div>

            </div>
        </div>


    </div>

@stop
