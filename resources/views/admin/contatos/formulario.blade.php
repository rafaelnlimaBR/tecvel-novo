<div class="card ">
    <div class="card-body">
        <form method="POST" action="">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="numero">Numero</label>
                <input type="text" class="form-control" id="Nome" placeholder="Numero de Telefone" name="nome">
              </div>
              <div class="form-group col-md-3">
                <label for="responsavel">Responsável</label>
                <input type="text" class="form-control" id="responsavel" placeholder="Responsável do Contato" name="responsavel">
              </div>
              <div class="form-group col-md-3">
                <label for="app">State</label>
                <select id="app" class="form-control" name="app">
                  <option value="0" selected>Não</option>
                  @foreach ($aplicativos as $app)
                    <option value="{{$app->id}}" selected>{{$app->nome}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="butaoCad">Cadastrar</label>
                <input type="submit" class="form-control" id="butao-enviar-contato" placeholder="Email">
              </div>
            </div>
        </form>

        <div class="row">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th scope="col">Numero</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">App</th>
                            <th scope="col">Criado</th>
                            <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contatos as $contato)
                            <tr>

                                <td>{{$contato->numero}}</td>
                                <td>{{$contato->email}}</td>
                                <td></td>
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
        </div>
    </div>

</div>
