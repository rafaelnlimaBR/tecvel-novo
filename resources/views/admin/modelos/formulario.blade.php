@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-5 col-sm-4 col-md-4">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($modelo)? route('modelo.atualizar',['modelo'=>$modelo]):route('modelo.cadastrar') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="Nome">Nome</label>
                            <input type="text"  class="form-control caixa-alta {{$errors->has('nome')?'parsley-error':''}}" id="Nome" placeholder="Nome" name="nome" value="{{old('nome',isset($modelo)?$modelo->nome:'')}}">
                              @error('nome')
                              <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                              @enderror
                          </div>
                            <div class="form-group col-md-6">
                                <label for="Montadoras">Montadoras</label>
                                <select   class="form-control {{$errors->has('montadora')?'parsley-error':''}}"  name="montadora" >
                                    @foreach($montadoras as $m)
                                        @if(isset($modelo))
                                            @if($m->id == $modelo->montadora->id)
                                                <option selected value="{{$m->id}}">{{$m->nome}}</option>
                                            @else
                                                <option value="{{$m->id}}">{{$m->nome}}</option>
                                            @endif
                                        @else
                                            <option value="{{$m->id}}">{{$m->nome}}</option>
                                        @endif

                                    @endforeach
                                </select>
                                @error('montadora')
                                <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                                @enderror
                            </div>


                    </div>
                    <div class="form-row">

                      </div>
                      <div class="form-row">


                      </div>
                    @if(isset($modelo))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('modelo.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
