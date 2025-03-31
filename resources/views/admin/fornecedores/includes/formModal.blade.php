<div class="modal fade" id="fornecedorModal" tabindex="-1" role="dialog" aria-labelledby="lavelModalFornecedor" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de Fornecedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('admin.fornecedores.includes.form',['modal'=>true])
            </div>

        </div>
    </div>
</div>
