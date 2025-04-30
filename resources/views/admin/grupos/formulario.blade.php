@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($grupo)? route('grupo.atualizar'):route('grupo.cadastrar') }}" method="POST">
                    {{ csrf_field() }}
                    @if(isset($grupo))
                        <input hidden type="text" class="form-control" id="id-grupo" placeholder="" name="id" value="{{$grupo->id}}">
                    @endif
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="inputEmail4">Nome</label>
                        <input type="text"  class="form-control {{$errors->has('nome')?'parsley-error':''}}" id="Nome" placeholder="Nome" name="nome" value="{{isset($grupo)?$grupo->nome:''}}">
                          @error('nome')
                          <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                          @enderror
                      </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">É Admin?</label>
                            <select class="form-control" name="admin">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Permissões</label>
                            <select class="form-control mult-select" name="permissoes[]" multiple>


                                @foreach($permissoes as $permissao)
                             //fazer um selected com if
                                    <option value="{{$permissao->id}}">{{$permissao->nome}}</option>
                                @endforeach
                            </select>
                            <a class="btn btn-sm btn-primary " style="color: #eeeeee; margin: 5px"  id="selecionar-tudo-multi" onclick="">Selecionar Tudo</a>
                            <a class="btn btn-sm btn-warning " style="color: #eeeeee; margin: 5px"  id="deselecionar-tudo-multi" onclick="">Deselecionar Tudo</a>
                        </div>

                      </div>
                      <div class="form-row">


                      </div>
                    @if(isset($grupo))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('grupo.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
