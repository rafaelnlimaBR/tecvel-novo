@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($status)? route('status.atualizar'):route('status.cadastrar') }}" method="POST">
                    {{ csrf_field() }}
                    @if(isset($status))
                        <input hidden type="text" class="form-control" id="id-status" placeholder="" name="id" value="{{$status->id}}">
                    @endif
                    <div class="form-row">
                      <div class="form-group col-lg-3">
                        <label for="nome">Nome</label>
                        <input type="text" required class="form-control" id="Nome" placeholder="Nome" name="nome" value="{{isset($status)?$status->nome:''}}">
                      </div>
                        <div class="form-group col-lg-2">
                            <label for="Cor">Cor de fundo</label>
                            <input type="color" required class="form-control form-control-color"   name="cor-fundo" value="{{isset($status)?$status->cor_fundo:''}}">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="Cor">Cor da Letra</label>
                            <input type="color" required class="form-control form-control-color"   name="cor-letra" value="{{isset($status)?$status->cor_letra:''}}">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <label for="funcoes">Habilitar Funções</label>
                            <select class="form-control" name="funcoes">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>

                        </div>
                        <div class="form-group col-lg-3">
                            <label for="Cobrar">Cobrar</label>
                            <select class="form-control" name="cobrar">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>

                        </div>
                      </div>
                      <div class="form-row">


                      </div>
                    @if(isset($status))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('status.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
