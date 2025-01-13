@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-2 col-sm-4 col-md-4">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($montadora)? route('montadora.atualizar'):route('montadora.cadastrar') }}" method="POST">
                    {{ csrf_field() }}
                    @if(isset($montadora))
                        <input hidden type="text" class="form-control" id="id-montadora" placeholder="" name="id" value="{{$montadora->id}}">
                    @endif
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Nome</label>
                        <input type="text" required class="form-control" id="Nome" placeholder="Nome" name="nome" value="{{isset($montadora)?$montadora->nome:''}}">
                      </div>


                    </div>
                    <div class="form-row">

                      </div>
                      <div class="form-row">


                      </div>
                    @if(isset($montadora))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('montadora.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
