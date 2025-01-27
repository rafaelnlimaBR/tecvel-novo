<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{route('contrato.adicionar.servico')}}" id="form-adicionar-servico-historico">
        <div class="form-row">
            <div class="form-group col-md-3">
                <input type="hidden" name="historico_id" value="{{$historico->id}}">
                <label for="servicos">Serviços</label>
                <input class="form-control" list="servicos-datalista-atualizaval" id="servicos-nome" name="ice-cream-choice" />

                <datalist id="servicos-datalista-atualizaval">
                    <option value="Chocolate"></option>
                    <option value="Coconut"></option>
                    <option value="Mint"></option>
                    <option value="Strawberry"></option>
                    <option value="Vanilla"></option>
                </datalist>
            </div>
            <div class="form-group col-md-2">
                <label for="valor">Valor</label>
                <input required type="text" class="form-control" id="valor-servico" placeholder="valor" name="valor">
            </div>
            <div class="form-group col-md-2">
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
            </div>
            <div class="form-group col-md-1">
                <label for="botao-adicionar">Valor</label>
                <button  type="submit" class="form-control btn btn-primary" name="botao-adicionar">Adicionar</button>
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
