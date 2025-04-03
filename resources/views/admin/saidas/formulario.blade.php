@extends('admin.index')

@section('conteudo')
    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>

    <div class="row">
        <div class="col-lg-5 col-sm-4 col-md-4">
            <div class="card ">
                <div class="card-body">
                   @include('admin.saidas.includes.form')
                </div>

            </div>
        </div>


    </div>

@stop
