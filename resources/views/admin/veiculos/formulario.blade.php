@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row formulario-veiculo">
    <div class="col-lg-5 col-sm-5 col-md-6">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($veiculo)? route('veiculo.atualizar'):route('veiculo.cadastrar') }}" method="POST" >
                @include('admin.veiculos.form')
                    @if(isset($veiculo))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('veiculo.index')}}" class="btn btn-secondary">Voltar</a>
                </form>
            </div>

        </div>
    </div>


</div>

@stop
