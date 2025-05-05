<div class="modal fade" id="formularioClienteModal"  aria-labelledby="clienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form  method="post" name="cadastrarClienteModal" id="cadastrarClienteModal">
            <input type="hidden" class="form-control"  name="modal" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clienteModalLabel">Novo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body form-atualizavel">

                  @include('admin.clientes.includes.form')

                </div>
                <div class="modal-footer">

{{--                    <button type="submit" class="btn btn-success">Cadastrar</button>--}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </form>
    </div>
</div>
