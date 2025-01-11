<div class="card ">
    <div class="card-body">
        <form method="POST" action="{{ $route_action }}" name="adicionar-contato">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$id}}">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="numero">Numero</label>
                <input type="text" class="form-control" placeholder="Numero de Telefone" name="numero" id="numero-contato">
              </div>
              <div class="form-group col-md-3">
                <label for="responsavel">Responsável</label>
                <input type="text" class="form-control" id="responsavel" placeholder="Responsável do Contato" name="responsavel">
              </div>
              <div class="form-group col-md-3">
                <label for="app">Aplicatico de Mensagem</label>
                <select id="app" class="form-control" name="app">
                  <option value="0" selected>Não</option>
                  @foreach ($aplicativos as $app)
                    @if ($app == null)
                        <option value="0" selected>Não tem app</option>
                    @else
                    <option value="{{$app->id}}" selected>{{$app->nome}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="butaoCad">Cadastrar</label>
                <button type="submit" class="form-control btn btn-success" id="butao-enviar-contato" >Gravar Telefone</button>
              </div>
            </div>
        </form>
        <div class="tabela-atualizavel" id="tabela-atualizavel">
            @include('admin.contatos.tabela',$contatos)
        </div>
    </div>

</div>

