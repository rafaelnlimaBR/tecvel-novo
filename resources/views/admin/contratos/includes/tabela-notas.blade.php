<a href="{{route('contrato.nova.nota',['id'=>$contrato->id,'historico_id'=>$historico->id])}}" class="btn btn-success btn-sm" style="margin-bottom: 20px; color: white">Nova Nota</a>
<div class="row">

    <div class="col-md-12">
        @foreach($contrato->historicos as $historico)
            @foreach($historico->notas as $nota)
                <div style="border: 1px solid #e2e2e2; padding: 5px; margin: 10px">


                    <div class="row " >
                        <div class="col-md-12">
                            <h4>{{$nota->historico->status->nome. " - ".$nota->tipo->nome." - ".\Carbon\Carbon::parse($nota->created_at)->format('d/m/Y')}}</h4>
                            {!! $nota->texto !!}
                            <a style="margin: 10px" class="btn btn-sm btn-warning" href="{{route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$historico->id,'nota_id'=>$nota->id])}}"> editar</a>
                            @if($nota->tipo->cliente == 1)
                                <a class="btn btn-success" href="{{route('contrato.enviar.imagens.aplicativo',['id'=>$contrato->id,'historico_id'=>$historico->id,'nota_id'=>$nota->id])}}" style="padding-top: 0; padding-bottom: 0"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            @endif

                        </div>

                    </div>
                    @if($nota->imagens()->count() != 0)
                        <div class="galeriaNotas gallery">
                            @foreach($nota->imagens as $imagem)

                                <a href="{{url('/images/notas/'.$imagem->nome)}}" data-caption="{{$imagem->texto}}">
                                    <img src="{{url('/images/notas/'.$imagem->nome)}}" alt="">
                                </a>

                            @endforeach
                        </div>

                    @endif
                </div>
            @endforeach
        @endforeach
    </div>
</div>


{{--@include("admin.pecas.modal",['modal'=>'1'])--}}
