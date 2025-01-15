@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row formulario-veiculo">
    <div class="col-lg-5 col-sm-5 col-md-6">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($veiculo)? route('veiculo.atualizar'):route('veiculo.cadastrar') }}" method="POST">
                    {{ csrf_field() }}
                    @if(isset($veiculo))
                        <input hidden type="text" class="form-control" id="id-veiculo" placeholder="" name="id" value="{{$veiculo->id}}">
                    @endif
                    <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="placa">Placa</label>
                            <input type="text" required class="form-control"  placeholder="Placa" name="placa" value="{{isset($veiculo)?$veiculo->placa:''}}">
                          </div>
                        <div class="form-group col-md-5">
                            <label for="ano">Ano</label>
                            <input type="text" required class="form-control"  placeholder="Ano" name="ano" value="{{isset($veiculo)?$veiculo->ano:''}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cor">Cor</label>
                            <input list="cor" class="form-control" name="cor" required value="{{isset($veiculo)?$veiculo->cor:""}}" />
                            <datalist id="cor" >
                                @foreach($cores as $c)

                                        <option  value="{{$c['nome']}}"></option>

                                @endforeach

                            </datalist>
                        </div>


                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="marca">Montadora</label>
                            <select name="montadora" id="montadora-veiculos" class="form-control">
                                @foreach($montadoras as $m)
                                    @if(isset($veiculo))
                                        @if($m->id == $veiculo->modelo->montadora->id)
                                            <option selected value="{{$m->id}}">{{$m->nome}}</option>
                                        @else
                                            <option value="{{$m->id}}">{{$m->nome}}</option>
                                        @endif
                                    @else
                                        <option value="{{$m->id}}">{{$m->nome}}</option>
                                    @endif


                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelos" >Modelos</label>
                            <input list="modelos" class="form-control" id="modelos-veiculos" name="modelo" value="{{isset($veiculo)?$veiculo->modelo->nome:""}}">

                            <datalist id="modelos">

                            </datalist>



                        </div>
                    </div>
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
