@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($categoria)? route('categoria.atualizar',['categoria'=>$categoria]):route('categoria.cadastrar') }}" method="POST">
                    {{ csrf_field() }}
                    @if(isset($categoria))
                        <input hidden type="text" class="form-control" id="id-categoria" placeholder="" name="id" value="{{$categoria->id}}">
                    @endif
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Nome</label>
                        <input type="text"  class="form-control {{$errors->has('nome')?'parsley-error':''}}" id="Nome" placeholder="Nome" name="nome" value="{{isset($categoria)?$categoria->nome:''}}">
                          @error('nome')
                          <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                          @enderror
                      </div>


                    </div>
                    <div class="form-row">

                      </div>
                      <div class="form-row">


                      </div>
                    @if(isset($categoria))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('categoria.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
