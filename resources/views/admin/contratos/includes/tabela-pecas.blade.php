<div class="table-responsive-sm">

    <table class="table table-bordered tabela-pecas-historicos">
        <thead>
        <tr>

            <th style="width: 4%; "  scope="col">Item</th>
            <th scope="col">Nome</th>
            <th style="width: 10%; " scope="col">Valor</th>
            <th scope="col" style="width: 10%; " >Cobrar</th>
            <th style="width: 10%; min-width: 150px;"  scope="col">Criado </th>
            <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

        </tr>
        </thead>
        <tbody>



        @foreach ($contrato->historicos as $historico)
            @foreach($historico->pecas as $i=>$peca)
                <tr>
                    <td>{{$peca->pivot->id}}</td>
                    <td>{{$peca->nome}}</td>
                    <td><input class="form-control" name="valor-peca-table" id="valor-peca-{{$peca->pivot->id}}"  value="{{$peca->pivot->valor}}"> </td>
                    <td>

                        <select class="form-control" name="cobrar" id="cobrar-peca-{{$peca->pivot->id}}">
                            @if($peca->pivot->cobrar == true)
                                <option value="1" selected>Sim</option>
                                <option value="0" >Não</option>
                            @else
                                <option value="1" >Sim</option>
                                <option value="0" selected>Não</option>
                            @endif
                        </select>
                    </td>

                    <td>{{\Carbon\Carbon::parse($peca->data)->format('d/m/Y') }}</td>


                    <td>
                        <a class="btn btn-sm btn-danger btn-remover-peca-historico" route_delete="{{route('contrato.remover.peca')}}" style="padding-top: 0; padding-bottom: 0" historico_id="{{$historico->id}}" peca_id="{{$peca->pivot->id}}" ><i class="fa  fa-trash-o"></i></a>
                        <a class="btn btn-sm btn-warning btn-atualizar-peca-historico" route_update="{{route('contrato.atualizar.peca')}}" style="padding-top: 0; padding-bottom: 0" peca_id="{{$peca->pivot->id}}"  contrato_id="{{$contrato->id}}"><i class="fa  fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach

        @endforeach

        </tbody>

    </table>
    <h5><b>Valor Total </b> R$ {{$contrato->somaTotalPecasAvulsas()}}</h5>
</div>
