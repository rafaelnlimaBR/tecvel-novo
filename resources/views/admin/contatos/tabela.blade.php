<div class="table-responsive-sm tabela-contatos">
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

                    <td><input class="form-control" value="{{$contato->numero}}" name="numero" id="numero-{{$contato->id}}"></td>
                    <td><input class="form-control"  value="{{$contato->responsavel}}" name="responsavel" id="responsavel-{{$contato->id}}"></td>
                    <td><select  class="form-control" name="app" id="app-{{$contato->id}}">

                        @foreach ($aplicativos as $app)

                            @if($app->id == $contato->app_id)
                                <option selected  value="{{$app->id}}" >{{$app->nome}}</option>
                            @else
                                <option  value="{{$app->id}}" >{{$app->nome}}</option>
                            @endif

                        @endforeach
                      </select></td>
                    <td>{{\Carbon\Carbon::parse($contato->created_at)->format('d/m/Y')}}</td>


                    <td>

                        <button class="btn  btn-warning botao-editar" contato="{{$contato->id}}" foreignkey="{{$id}}"  style="padding-top: 0; padding-bottom: 0" route-update="{{$route_update}}"><i class="fa  fa-pencil-square"></i></button>
                        <button class="btn         V NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN btn-danger botao-excluir" contato="{{$contato->id}}" foreignkey="{{$id}}"  style="padding-top: 0; padding-bottom: 0" route-delete="{{$route_delete}}"><i class="fa  fa-trash-o"></i></button>


                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

</div>
