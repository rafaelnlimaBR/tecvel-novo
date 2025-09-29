<div class="row">
    <div class="col-md-12">
        <form method="post" action="" id="form-adicionar-peca-historico">
        <div class="form-row">
            <div class="form-group col-md-3">
                <input type="hidden" name="historico_id" value="{{$historico->id}}">
                <label for="pecas">Peças</label>

                <input list="lista-pecas" class="form-control caixa-alta" id="input-peca" name="peca"  />

                <datalist id="lista-pecas">

                </datalist>
               {{-- <select required class="form-control" name="peca" id="pecas-select2">

                </select>--}}

            </div>
            <div class="form-group col-md-2">
                <label for="valor">Valor</label>
                <input required type="text" class="form-control dinheiro" id="valor-peca" placeholder="Valor" name="valor">
            </div>
            <div class="form-group col-md-1">
                <label for="qnt">Qnt</label>
                <input required type="text" class="form-control" id="qnt" placeholder="Qnt" name="qnt" value="1">
            </div>
            <div class="form-group col-md-1">
                <label for="desconto">Desconto</label>
                <input required type="text" class="form-control numero" id="desconto" placeholder="Desconto" name="desconto" value="0">
            </div>
            <div class="form-group col-md-2">
                <label for="marca">Marca</label>
                <input  type="text" class="form-control"  placeholder="Marca" name="marca-peca" id="marca-peca">
            </div>
            <div class="form-group col-md-1">
                <label  for="cobrar">Cobrar</label>
                <select class="form-control" name="cobrar" id="cobrar-peca">
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
                <label for="botao-adicionar">Adicionar</label>
                <button  type="submit" class="form-control btn btn-primary" name="botao-adicionar">Adicionar</button>
            </div>


        </div>
        </form>

    </div>
</div>
<div class="row " >
    <div class="col-lg-12">
        <div id="tabela-pecas-atualizavel">
        @include("admin.contratos.includes.tabela-pecas")
        </div>
    </div>

</div>

{{--@include("admin.pecas.modal",['modal'=>'1'])--}}
