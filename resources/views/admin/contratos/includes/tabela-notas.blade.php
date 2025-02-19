<a href="{{route('contrato.nova.nota',['id'=>$contrato->id,'historico_id'=>$historico->id])}}" class="btn btn-success btn-sm" style="margin-bottom: 20px; color: white">Nova Nota</a>
<div class="row">

    <div class="col-md-12">
        @foreach($contrato->historicos as $historico)
            @foreach($historico->notas as $nota)
                <div style="border-bottom: 1px solid #adadad">


                    <div class="row " >
                        <div class="col-md-3">
                            <h5>{{$nota->historico->status->nome. " - ".\Carbon\Carbon::parse($nota->created_at)->format('d/m/Y')}}</h5>
                            <h6>{{$nota->tipo->nome}}</h6>
                            <a class="btn btn-warning" href="{{route('contrato.editar.nota',['id'=>$contrato->id,'historico_id'=>$historico->id,'nota_id'=>$nota->id])}}"> editar</a>
                        </div>
                        <div class="col-md-9">
                            {!! $nota->texto !!}
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




        {{--<table class="table-responsive-lg table ">
            <tbody>
            @foreach($contrato->historicos as $historico)
                @foreach($historico->notas as $nota)


                    <tr>
                        <td></td>
                        <td><h6></h6></td>
                        <td><h5></h5></td>
                        <td></td>
                        <td></td>
                    </tr>

                @endforeach
            @endforeach

            </tbody>
        </table>--}}





    </div>
</div>


{{--@include("admin.pecas.modal",['modal'=>'1'])--}}
