


<div class="modal fade formulario-veiculo" id="formularioVeiculoModal"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="cadastrarVeiculoModal">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Novo Veículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('admin.veiculos.form',['modal'=>1])
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

                </div>
            </form>
        </div>
    </div>
</div>
