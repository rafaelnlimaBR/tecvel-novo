<div class="row">
    <div class="col-md-12">
        <div class="form-row">
            <div class="form-group col-md-1">

                <a href="{{route('contrato.entrada',['id'=>$contrato->id])}}" style="color: white"  class="form-control btn btn-success">Faturar</a>
            </div>

        </div>


    </div>
</div>
<div class="row" >
    <div class="col-lg-12">
        <div id="tabela-entradas">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td style="width: 15%">Valor</td>
                        <td style="width: 15%">Valor Pago</td>
                        <td>Data</td>
                        <td>Tipo </td>
                        <td>Forma</td>
                        <td>Taxa </td>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>


