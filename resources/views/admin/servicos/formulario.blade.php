@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($servico)? route('servico.atualizar'):route('servico.cadastrar') }}" method="POST">
                    @include("admin.servicos.include.form")


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
