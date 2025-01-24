<div class="table-responsive-sm">

    <table class="table table-bordered tabela-servicos-historicos">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>

            <th style="width: 10%; min-width: 150px;"  scope="col">Criado </th>
            <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

        </tr>
        </thead>
        <tbody>



        @foreach ($contrato->historicos as $historico)
            @foreach($historico->servicos as $servico)
                <tr>

                    <td>{{$servico->nome}}</td>
                    <td>{{$servico->pivot->valor}}</td>

                    <td>{{\Carbon\Carbon::parse($servico->data)->format('d/m/Y')}}</td>


                    <td>
                        <a class="btn btn-sm btn-danger btn-remover-servico-historico" route_delete="{{route('contrato.remover.servico')}}" style="padding-top: 0; padding-bottom: 0" historico_id="{{$historico->id}}" servico_id="{{$servico->id}}" ><i class="fa  fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach

        @endforeach

        </tbody>

    </table>
    <h5><b>Valor Total </b> R$ {{$contrato->somaTotalServicos()}}</h5>
</div>
