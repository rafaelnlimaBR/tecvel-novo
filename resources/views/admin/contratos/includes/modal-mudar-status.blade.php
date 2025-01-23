<div class="modal fade" id="modal-mudar-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Alterar Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('contrato.novo.status')}}" method="POST">
            <div class="modal-body">
               <div class="row">
                   <div class="col-lg-12">

                           {{ csrf_field() }}

                           <div class="form-row">
                               <div class="form-group col-md-12">
                                   <input type="hidden" id="id-modal-status" name="id_status">
                                   <input type="hidden" name="id_contrato" value="{{$contrato->id}}">
                                   <label for="obs">Observações</label>
                                   <textarea type="text" required class="form-control " id="obs-modal-status" name="obs" ></textarea>
                               </div>



                           </div>
                           <div class="form-row">

                           </div>
                           <div class="form-row">


                           </div>



                   </div>
               </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>
