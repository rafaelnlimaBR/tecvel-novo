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
                        <td style="width: 5%">#</td>
                        <td style="width: 15%">Valor</td>
                        <td style="width: 15%">Valor Pago</td>
                        <td style="width: 15%">Valor Líquido</td>
                        <td>Data</td>
                        <td>Taxa / Repassada </td>
                        <td>Forma</td>


                    </tr>
                </thead>
                <tbody>
                    @foreach($contrato->entradas as $i=>$entrada)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$entrada->valor}}</td>
                            <td>{{$entrada->valor_acrescimo}}</td>
                            <td>{{$entrada->valor_liquido}}</td>
                            <td>{{\Carbon\Carbon::parse($entrada->created_at)->format('d/m/Y H:i')}}</td>
                            <td>{{$entrada->taxa ."% / ".($entrada->repassar_taxa==true?"Cliente":"Loja")}}</td>

                            <td>{{$entrada->forma->tipo->nome.' / '.$entrada->forma->nome}}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


