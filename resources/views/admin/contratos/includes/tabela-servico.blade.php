<div class="table-responsive-sm">

    <table class="table table-bordered tabela-servicos-historicos">
        <thead>
        <tr>
            <th style="width: 4%; "  scope="col">Item</th>
            <th scope="col">Nome</th>
            <th style="width: 13%; " scope="col">Valor</th>
            <th style="width: 13%; " scope="col">D%</th>
            <th style="width: 13%; " scope="col">Valor Total</th>
{{--            <th scope="col" style="width: 10%; " >Cobrar</th>--}}

            <th style="width: 5%; min-width: 100px;" scope="col">Ações</th>

        </tr>
        </thead>
        <tbody>



        @foreach ($contrato->historicos as $h)
            @foreach($h->servicos as $servico)
                <tr class="{{$historico->status->id != $h->status->id? "table-warning":''}}">
                    <td>{{$h->id.'.'.$servico->pivot->id}}</td>
                    <td>{{$servico->nome}}</td>
                    @if($historico->status->id == $h->status->id)
                        <td><input class="form-control calcular-desconto numero" name="valor-servico-table" id="valor-servico-{{$servico->pivot->id}}" servico-id="{{$servico->pivot->id}}" ativo="valor-bruto"  value="{{$servico->pivot->valor}}"></td>
                        <td><input class="form-control calcular-desconto numero" name="desconto-servico-table" id="desconto-servico-{{$servico->pivot->id}}" servico-id="{{$servico->pivot->id}}" ativo="desconto" value="{{$servico->pivot->desconto}}"></td>
                        <td><input class="form-control calcular-desconto numero" name="valor-liquido-servico-table" id="valor-liquido-servico-{{$servico->pivot->id}}" servico-id="{{$servico->pivot->id}}" ativo="valor-liquido" value="{{$servico->pivot->valor_liquido}}"></td>
                    @else
                        <td>{{$servico->pivot->valor}}</td>
                        <td>{{$servico->pivot->desconto}}</td>
                        <td>{{$servico->pivot->valor_liquido}}</td>
                    @endif
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
                @if($historico->status->id == $h->status->id)

                        <a class="btn btn-sm btn-danger btn-remover-servico-historico" route_delete="{{route('contrato.remover.servico')}}" style="padding-top: 0; padding-bottom: 0" historico_id="{{$h->id}}" servico_id="{{$servico->pivot->id}}" ><i class="fa  fa-trash-o"></i></a>
                        <a class="btn btn-sm btn-warning btn-atualizar-servico-historico" route_update="{{route('contrato.atualizar.servico')}}" style="padding-top: 0; padding-bottom: 0" servico_id="{{$servico->pivot->id}}"  historico_id="{{$h->id}}"><i class="fa  fa-trash-o"></i></a>

                @endif
                    </td>
                </tr>
            @endforeach

        @endforeach

        </tbody>

    </table>
    <h5><b>Valor Total </b> R$ {{$contrato->totalServicosLiquido()}}</h5>
</div>
