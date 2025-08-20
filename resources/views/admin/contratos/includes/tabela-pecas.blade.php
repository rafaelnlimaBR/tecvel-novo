<div class="table-responsive-sm">

    <table class="table table-bordered tabela-pecas-historicos">
        <thead>
        <tr>

            <th style="width: 4%; "  scope="col">Item</th>
            <th scope="col">Nome</th>
            <th style="width: 10%; " scope="col">Valor</th>
            <th style="width: 100px; " scope="col">Qnt</th>
            <th style="width: 10%; " scope="col">Valor Total</th>
            <th style="width: 7%;" scope="col">D%</th>
            <th style="width: 10%; " scope="col">Valor Liquido</th>
            <th style="width: 10%; " scope="col">Valor Final</th>
            <th style="width: 10%; " scope="col">Marca</th>
{{--            <th scope="col" style="width: 10%; " >Cobrar</th>--}}

            <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

        </tr>
        </thead>
        <tbody>



        @foreach ($contrato->historicos as $h)
            @foreach($h->pecas as $i=>$peca)
                <tr class="{{$historico->status->id != $h->status->id? "table-warning":''}}">
                    <td>{{$h->id.'.'.$peca->pivot->id}}</td>
                    <td>{{$peca->nome}}</td>
                    @if($historico->status->id != $h->status->id)
                        <td>{{$peca->pivot->valor}}</td>
                        <td>{{$peca->pivot->qnt}}</td>
                        <td>{{$peca->pivot->qnt*$peca->pivot->valor}}</td>
                        <td>{{$peca->pivot->desconto}}</td>
                        <td>{{$peca->pivot->valor_liquido}}</td>
                        <td>{{$peca->pivot->valor_liquido_total}}</td>
                        <td>{{$peca->pivot->marca}}</td>
                    @else
                        <td><input class="form-control calcular-valor-pecas dinheiro" name="valor-peca-table" id="valor-peca-{{$peca->pivot->id}}" peca_id="{{$peca->pivot->id}}" ativo="valor-peca"  value="{{$peca->pivot->valor}}"> </td>
                        <td><input class="form-control calcular-valor-pecas"  name="qnt-peca-table" id="qnt-peca-{{$peca->pivot->id}}"  peca_id="{{$peca->pivot->id}}" ativo="qnt-peca" value="{{$peca->pivot->qnt}}"> </td>
                        <td><input disabled class="form-control calcular-valor-pecas "  name="valor-total-peca-table"  peca_id="{{$peca->pivot->id}}" id="valor-total-peca-{{$peca->pivot->id}}"  value="{{$peca->pivot->qnt*$peca->pivot->valor}}"> </td>
                        <td><input class="form-control calcular-valor-pecas numero" name="desconto-peca-table" id="desconto-peca-{{$peca->pivot->id}}"  peca_id="{{$peca->pivot->id}}" ativo="desconto-peca"  value="{{$peca->pivot->desconto}}"> </td>
                        <td><input class="form-control calcular-valor-pecas dinheiro" name="valor-liquido-table" id="valor-liquido-{{$peca->pivot->id}}"  peca_id="{{$peca->pivot->id}}" ativo="valor-liquido-peca" value="{{$peca->pivot->valor_liquido}}"> </td>
                        <td><input class="form-control calcular-valor-pecas dinheiro" name="valor-liquido-total-table" id="valor-liquido-total-{{$peca->pivot->id}}"  peca_id="{{$peca->pivot->id}}" ativo="valor-liquido-total-peca" value="{{$peca->pivot->valor_liquido_total}}" disabled> </td>
                        <td><input class="form-control caixa-alta" name="marca-peca-table" id="marca-peca-{{$peca->pivot->id}}"  value="{{$peca->pivot->marca}}"></td>
                    @endif

                    {{--<td>

                        <select class="form-control" name="cobrar" id="cobrar-peca-{{$peca->pivot->id}}">
                            @if($peca->pivot->cobrar == true)
                                <option value="1" selected>Sim</option>
                                <option value="0" >Não</option>
                            @else
                                <option value="1" >Sim</option>
                                <option value="0" selected>Não</option>
                            @endif
                        </select>
                    </td>--}}


                    <td>
                        @if($historico->status->id == $h->status->id)

                                <a class="btn btn-sm btn-danger btn-remover-peca-historico" route_delete="{{route('contrato.remover.peca')}}" style="padding-top: 0; padding-bottom: 0" historico_id="{{$h->id}}" peca_id="{{$peca->pivot->id}}" ><i class="fa  fa-trash-o"></i></a>
                                <a class="btn btn-sm btn-warning btn-atualizar-peca-historico" route_update="{{route('contrato.atualizar.peca')}}" style="padding-top: 0; padding-bottom: 0" peca_id="{{$peca->pivot->id}}"  historico_id="{{$h->id}}"><i class="fa  fa-trash-o"></i></a>

                        @endif
                    </td>
                </tr>
            @endforeach

        @endforeach

        </tbody>

    </table>
    <h5><b>Valor Total </b> R$ {{$contrato->totalPecasLiquido()}}</h5>
</div>
