
<div class="row justify-content-center">
    <div class="col-lg-3 ">
        <table class="table table-bordered ">
            <thead class="thead-light">
            <tr>

                <th scope="col">Status</th>
                <th scope="col">Data</th>


            </tr>
            </thead>
            <tbody>

            @foreach ($contrato->historicos as $historico)
                <tr>

                    <td>{{$historico->status->nome}}</td>
                    <td style="width: 7%;">{{\Carbon\Carbon::parse($historico->data)->format('d/m/Y')}}</td>
                </tr>
            @endforeach

            </tbody>

        </table>
    </div>
</div>
