<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{route('contrato.adicionar.servico')}}" id="form-adicionar-servico-historico">
        <div class="form-row">
            <div class="form-group col-md-3">
                <input type="hidden" name="historico_id" value="{{$historico->id}}">
                <label for="servicos">Serviços</label>
                <select required type="text" class="form-control" id="servicos-select2" placeholder="servicos" name="servico">

                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="valor">Valor</label>
                <input required type="text" class="form-control" id="valor" placeholder="valor" name="valor">
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
