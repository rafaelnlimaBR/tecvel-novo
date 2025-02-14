<a href="{{route('contrato.nova.nota',['id'=>$contrato->id,'historico_id'=>$historico->id])}}" class="btn btn-success btn-sm" style="margin-bottom: 20px; color: white">Nova Nota</a>
<div class="row">

    <div class="col-md-12">
        @foreach($contrato->historicos as $historico)
            @foreach($historico->notas as $nota)
                <div class="row">
                    <div class="col-md-2">
                        <h5>{{\Carbon\Carbon::parse($nota->created_at)->format('d/m/Y')}}</h5>
                        <h6>{{$nota->historico->status->nome}}</h6>
                    </div>
                    <div class="col-md-2">
                        <h5>{{$nota->tipo->nome}}</h5>
                    </div>
                    <div class="col-md-7">
                        <p>{!! $nota->texto !!}</p>
                    </div>
                    <div class="col-md-1">
                        <a href="{{route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$historico->id,'nota_id'=>$nota->id])}}"> editar</a>
                    </div>
                </div>
            @endforeach
        @endforeach




    </div>
</div>


{{--@include("admin.pecas.modal",['modal'=>'1'])--}}
