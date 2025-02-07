@if(isset($contrato))
    <div class="row " style="border-bottom-color: #b4b4b4; border: 1px;">
        <div class="col-lg-1">
            <h4>ID : <b>{{$contrato->id}} </b></h4><br>
        </div>
        <div class="col-lg-2">
            <p>  Criado em {{\Carbon\Carbon::parse($contrato->data)->format('d/m/Y')}}</p>
        </div>
    </div>
@endif

<div class="row">

    <div class="col-lg-12">
        <form action="{{ isset($contrato)? route('contrato.atualizar'):route('contrato.cadastrar') }}" method="POST">
            {{ csrf_field() }}
            @if(isset($contrato))
                <input hidden type="text" class="form-control" id="id" placeholder="" name="id" value="{{$contrato->id}}">
                <input hidden type="text" class="form-control" id="historico" placeholder="" name="id_historico" value="{{$historico->id}}">
            @endif
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cliente" id="">Cliente <span id="cadastrar-cliente"><a style="color: #ffffff" data-toggle="modal" data-target="#formularioClienteModal" class="btn btn-sm btn-primary" id="botao-cliente-modal" >Novo</a></span><span id="editar-cliente"></span> </label>
                    <select type="text" required class="form-control select2" ui-select2="{width:'resolve',dropdownAutoWidth:true}" style="width:100%" id="pesquisa-cliente" name="cliente" >
                        @if(isset($contrato))
                            <option value="{{$contrato->cliente->id}}">{{$contrato->cliente->nome}}</option>
                        @endif
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label for="veiculo">Veiculo <span style=""><span id="cadastrar-veiculo"><a style="color: #ffffff" data-toggle="modal" data-target="#formularioVeiculoModal"  class="btn btn-sm btn-primary" >Novo</a></span><span id="editar-veiculo"></span> </span></label>
                    <select type="text" class="form-control select2" ui-select2="{width:'resolve',dropdownAutoWidth:true}" style="width:100%"   id="pesquisa-veiculo"  name="veiculo" >
                        @if(isset($contrato->veiculo))
                            <option value="{{$contrato->veiculo->id}}">{{$contrato->veiculo->placa}}</option>
                        @endif
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="defeito">Defeito </label>
                    <textarea style="min-height: 150px" class="form-control " name="defeito">{{isset($contrato)?$contrato->defeito:""}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="solucao">Solução </label>
                    <textarea style="min-height: 150px" class="form-control " name="solucao">{{isset($contrato)?$contrato->solucao:""}}</textarea>
                </div>


            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="garantia">Garantia </label>
                    <input class="form-control date-time" required name="garantia" value="{{isset($contrato)?\Carbon\Carbon::parse($contrato->garantia)->format('d/m/Y'):\Carbon\Carbon::now()->addDay(90)->format('d/m/Y')}}">
                </div>


            </div>
            <div class="row">
                <div class="col-lg-4">
                    @if(isset($contrato))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('contrato.index')}}" class="btn btn-secondary">Voltar</a>
                </div>
                <div class="col-lg-4" style="float: right">

                </div>
            </div>



        </form>
    </div>
</div>
