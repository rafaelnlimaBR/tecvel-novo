<table class="table table-bordered">
    <thead>
    <tr>

        <th scope="col">Nome</th>
        <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

    </tr>
    </thead>
    <tbody>

    @foreach ($status->proximosStatus()->get() as $proximos)
        <tr>
            <td>{{$proximos->nome}}</td>
            <td>
                <a class="btn btn-sm btn-danger desvincular-status" style="padding-top: 0; padding-bottom: 0" status="{{$status->id}}"  proximo-status="{{$proximos->id}}"><i class="fa  fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach

    </tbody>

</table>
