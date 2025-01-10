
    <div class="table-responsive-sm">
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th style="width: 15%; min-width: 150px;" scope="col">Numero</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">App</th>
                    <th scope="col">Criado</th>
                    <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($contatos as $contato)
                    <tr>

                        <td><input  value="{{$contato->numero}}" name="nome" ></td>
                        <td><input  value="{{$contato->responsavel}}" name="responsavel" ></td>
                        <td><input  value="{{$contato->responsavel}}" name="responsavel" ></td>
                        <td>{{\Carbon\Carbon::parse($contato->created_at)->format('d/m/Y')}}</td>


                        <td>
                            <button class="btn btn-sm btn-primary" style="padding-top: 0; padding-bottom: 0"><i class="fa   fa-sign-out"></i></button>
                            <button class="btn btn-sm btn-warning" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-pencil-square"></i></button>
                            <button class="btn btn-sm btn-danger" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-trash-o"></i></button>


                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

