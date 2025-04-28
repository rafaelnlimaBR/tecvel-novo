@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-10 col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($usuario)? route('usuario.atualizar'):route('usuario.cadastrar') }}" method="POST">
                    {{ csrf_field() }}
                    @if(isset($usuario))
                        <input hidden type="text" class="form-control" id="id-usuario" placeholder="" name="id" value="{{$usuario->id}}">
                    @endif
                    <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="nome">Nome</label>
                            <input type="text"  class="form-control caixa-alta {{$errors->has('nome')?'parsley-error':''}}" id="Nome" placeholder="Nome" name="nome" value="{{old('nome',isset($usuario)?$usuario->name:'')}}">
                              @error('nome')
                              <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                              @enderror
                          </div>
                          <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="text" class="form-control caixa-baixa {{$errors->has('email')?'parsley-error':''}}"  placeholder="Email" name="email" value="{{old('email',isset($usuario)?$usuario->email:'')}}">
                              @error('email')
                              <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                              @enderror
                          </div>
                            <div class="form-group col-md-4">
                                <label for="email">Senha</label>
                                <input type="text" class="form-control {{$errors->has('senha')?'parsley-error':''}}" placeholder="Senha" name="senha" value="{{old('senha')}}">
                                @error('senha')
                                <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                                @enderror
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Grupo</label>
                            <select multiple class="form-control {{$errors->has('grupos')?'parsley-error':''}}" name="grupos[]">
                                @foreach($grupos as $grupo)
                                    @if(isset($usuario))
                                        @foreach($usuario->grupos as $g)
                                            @if($grupo->id == $g->id)
                                                <option selected value="{{$grupo->id}}"> {{$grupo->nome}}</option>
                                            @else
                                                <option value="{{$grupo->id}}"> {{$grupo->nome}}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="{{$grupo->id}}"> {{$grupo->nome}}</option>
                                    @endif

                                @endforeach
                            </select>

                            @error('grupos')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>
                    </div>


                    @if(isset($usuario))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('usuario.index')}}" class="btn btn-secondary">Voltar</a>


                </form>
            </div>

        </div>
    </div>


</div>

@stop
