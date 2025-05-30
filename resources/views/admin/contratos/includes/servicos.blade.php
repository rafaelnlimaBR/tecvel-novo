<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{route('contrato.adicionar.servico')}}" id="form-adicionar-servico-historico">
        <div class="form-row">
            <div class="form-group col-md-3">
                <input type="hidden" name="historico_id" value="{{$historico->id}}">

                <label for="servico">Serviços</label>
                <select required type="text" class="form-control select2" id="servicos-select2" name="servico"></select>

            </div>

            <div class="form-group col-md-3">
                <label for="valor">Valor</label>
                <input required type="text" class="form-control select2" id="valor-servico" placeholder="valor" name="valor">
            </div>
            {{--<div class="form-group col-md-2">
                <label for="cobrar">Cobrar</label>
                <select class="form-control" name="cobrar" id="cobrar-servico">
                    @if($historico->status->cobrar == true)
                        <option value="1" selected>Sim</option>
                        <option value="0" >Não</option>
                    @else
                        <option value="1" >Sim</option>
                        <option value="0" selected>Não</option>
                    @endif
                </select>
            </div>--}}
            <div class="form-group col-md-1">
                <label for="botao-adicionar">Adicionar</label>
                <button  type="submit" class="form-control btn btn-primary" name="botao-adicionar">Adicionar</button>
            </div>
            <div class="form-group col-md-1">
                <label for="botao-cadastrar-servico">Cadastrar</label>
                <a  class="form-control btn btn-success" name="botao-cadastrar-servico" data-toggle="modal" data-target="#modal-novo-servico">Cadastrar</a>
            </div>

        </div>
        </form>

    </div>
</div>
<div class="row" >
    <div class="col-lg-12">
        <div id="tabela-servicos-atualizavel">
        @include("admin.contratos.includes.tabela-servico")
        </div>
    </div>

</div>

@include("admin.servicos.modal",['modal'=>'1'])
