<table class="table table-bordered">
    <thead class="thead-light">
    <tr>
        <th style="width: 5%; min-width: 40px;" scope="col">#</th>
        <th scope="col">Cliente</th>
        <th scope="col">Placa</th>
        <th scope="col">Status</th>

        <th style="width: 10%; min-width: 150px;"  scope="col">Criado </th>
        <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

    </tr>
    </thead>
    <tbody>

    @foreach ($contratos as $contrato)
        <tr>
            <th scope="row">{{$contrato->id}}</th>
            <td>{{$contrato->cliente->nome}}</td>
            <td>{{isset($contrato->veiculo)?$contrato->veiculo->placa." - ".$contrato->veiculo->modelo->nome:"ND"}}  </td>
            <td>{{$contrato->status()->first()->nome}}</td>

            <td>{{\Carbon\Carbon::parse($contrato->created_at)->format('d/m/Y')}}</td>


            <td>
                <button class="btn btn-sm btn-primary" style="padding-top: 0; padding-bottom: 0"><i class="fa   fa-sign-out"></i></button>
                <a href="{{route('contrato.editar',['id'=>$contrato->id])}}" class="btn btn-sm btn-warning" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-pencil-square"></i></a>
                <button class="btn btn-sm btn-danger" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-trash-o"></i></button>


            </td>
        </tr>
    @endforeach

    </tbody>

</table>
