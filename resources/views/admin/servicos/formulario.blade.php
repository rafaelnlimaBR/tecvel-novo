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
                    {{ csrf_field() }}
                    @if(isset($servico))
                        <input hidden type="text" class="form-control" id="id-servico" placeholder="" name="id" value="{{$servico->id}}">
                    @endif
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="nome">Nome</label>
                        <input type="text" required class="form-control caixa-alta"  placeholder="Nome" name="servico" value="{{isset($servico)?$servico->nome:''}}">
                      </div>
                        <div class="form-group col-md-4">
                            <label for="valor">Valor</label>
                            <input type="text" required class="form-control" placeholder="Valor" id="valor-servico" name="valor" value="{{isset($servico)?$servico->valor:''}}">
                        </div>

                    </div>
                    <div class="form-row">

                      </div>
                      <div class="form-row">


                      </div>
                    @if(isset($servico))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('servico.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
