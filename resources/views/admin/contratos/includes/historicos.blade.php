
{{--<div class="row justify-content-center">--}}
<div class="row">
    <div class="col-lg-3 ">
        <h4>Historicos</h4>
        <table class="table table-bordered ">
            <thead class="thead-light">
            <tr>
                <th>id</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th>Entrar</th>

            </tr>
            </thead>
            <tbody>

            @foreach ($contrato->historicos as $historico)
                <tr>
                    <td>{{$historico->id}}</td>
                    <td>{{$historico->status->nome}}</td>
                    <td style="width: 7%;">{{\Carbon\Carbon::parse($historico->data)->format('d/m/Y')}}</td>
                    <td><a href="{{route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$historico->id,'pagina'=>'dados'])}}" class="btn btn-sm btn-primary">></a> </td>
                </tr>
            @endforeach

            </tbody>

        </table>
    </div>

</div>
