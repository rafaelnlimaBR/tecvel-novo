@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($categoria)? route('categoria.produto.atualizar',['categoria'=>$categoria]):route('categoria.produto.cadastrar') }}" method="POST">
                    {{ csrf_field() }}
                    {{--@if(isset($categoria))
                        <input hidden type="text" class="form-control" id="id-categoria" placeholder="" name="id" value="{{$categoria->id}}">
                    @endif--}}
                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="inputEmail4">Nome</label>
                        <input type="text"  class="form-control {{$errors->has('nome')?'parsley-error':''}}" id="Nome" placeholder="Nome" name="nome" value="{{isset($categoria)?$categoria->nome:''}}">
                          @error('nome')
                          <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                          @enderror
                      </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Status</label>
                            <select name="status" class="form-control">
                                @if(isset($categoria))
                                    @if($categoria->status == 1)

                                        <option value="1" selected>Sim</option>
                                        <option value="2">Não</option>
                                    @else
                                        <option value="1" >Sim</option>
                                        <option value="2" selected>Não</option>
                                    @endif
                                @else
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                @endif
                            </select>
                        </div>


                    </div>

                    @if(isset($categoria))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('categoria.produto.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
