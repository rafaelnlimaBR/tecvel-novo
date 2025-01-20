<div class="modal fade" id="formularioClienteModal" tabindex="-1" aria-labelledby="clienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form  method="post" name="cadastrarClienteModal" id="cadastrarClienteModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clienteModalLabel">Novo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required >
                            <input type="hidden" class="form-control"  name="modal" >
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="Email">Email</label>
                            <input type="Email" class="form-control" id="Email" placeholder="Email" name="email" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Telefone">Telefone</label>
                            <input type="tel" class="form-control" id="Telefone" placeholder="Telefone" name="contato" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="App">Aplicativos de Mensagem</label>
                            <select class="form-control" id="apps" name="app">
                                @foreach($aplicativos as $app)
                                    <option value="{{$app->id}}">{{$app->nome}}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </form>
    </div>
</div>
