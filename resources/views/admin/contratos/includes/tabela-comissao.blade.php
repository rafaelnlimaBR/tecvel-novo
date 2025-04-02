<div class="row">
    <div class="col-md-12">
        <div class="form-row">
            <div class="form-group col-md-1">

                <a href="{{route('contrato.nova.comissao',['id'=>$contrato->id,'historico_id'=>$historico->id])}}" style="color: white"  class="form-control btn btn-success">Cadastrar</a>
            </div>

        </div>


    </div>
</div>

<div class="table-responsive-sm">

    <table class="table table-bordered tabela-servicos-historicos">
        <thead>
        <tr>
            <th style="width: 4%; "  scope="col">Item</th>
            <th scope="col">Fornecedor</th>
            <th style="width: 13%; " scope="col">Valor</th>
            <th style="width: 13%; " scope="col">Pagamento</th>

            {{--<th style="width: 13%; " scope="col">D%</th>
            <th style="width: 13%; " scope="col">Valor Total</th>--}}
            {{--            <th scope="col" style="width: 10%; " >Cobrar</th>--}}

            <th style="width: 5%; min-width: 100px;" scope="col">Ações</th>

        </tr>
        </thead>
        <tbody>



        @foreach ($contrato->historicos as $h)
            @foreach($h->comissoes as $comissao)
                <tr>
                    <td>{{$h->id.'.'.$comissao->id}}</td>
                    <td>{{$comissao->fornecedor->nome}}</td>
                    <td>{{$comissao->valor}}</td>
                    <td>

                        @if($comissao->saidas->sum('valor') == $comissao->valor)
                            PAGO

                        @elseif($comissao->saidas->sum('valor') < $comissao->valor)
                            PENDENTE
                        @else
                            SUper
                        @endif
                    </td>

                    {{--<td><input class="form-control calcular-desconto numero" name="valor-servico-table" id="valor-servico-{{$servico->pivot->id}}" servico-id="{{$servico->pivot->id}}" ativo="valor-bruto"  value="{{$servico->pivot->valor}}"></td>
                    <td><input class="form-control calcular-desconto numero" name="desconto-servico-table" id="desconto-servico-{{$servico->pivot->id}}" servico-id="{{$servico->pivot->id}}" ativo="desconto" value="{{$servico->pivot->desconto}}"></td>
                    <td><input class="form-control calcular-desconto numero" name="valor-liquido-servico-table" id="valor-liquido-servico-{{$servico->pivot->id}}" servico-id="{{$servico->pivot->id}}" ativo="valor-liquido" value="{{$servico->pivot->valor_liquido}}"></td>--}}
                    {{--<td>

                        <select class="form-control" name="cobrar" id="cobrar-servico-{{$servico->pivot->id}}">
                            @if($servico->pivot->cobrar == true)
                                <option value="1" selected>Sim</option>
                                <option value="0" >Não</option>
                            @else
                                <option value="1" >Sim</option>
                                <option value="0" selected>Não</option>
                            @endif
                        </select>
                    </td>--}}




                    <td>
                        <a class="btn btn-sm btn-danger " onclick="return confirm('Deseja excluir esse registro')"  style="padding-top: 0; padding-bottom: 0" href="{{route('comissao.excluir',['id'=>$contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id])}}" ><i class="fa  fa-trash-o"></i></a>
                        <a class="btn btn-sm btn-warning " style="padding-top: 0; padding-bottom: 0" href="{{route('contrato.editar.comissao',['id'=>$contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id])}}"><i class="fa  fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach

        @endforeach

        </tbody>

    </table>
    <h5><b>Valor Total </b> R$ {{$contrato->totalServicosLiquido()}}</h5>
</div>
