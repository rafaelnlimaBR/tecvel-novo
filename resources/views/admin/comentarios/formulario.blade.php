@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6">
        <div class="card ">
            <div class="card-body">
                @if($comentario->cliente != null)
                    <h5>Cliente: {{$comentario->cliente->nome}}</h5>

                @endif
                <p><span ><b>Comentário: </b></span>{{$comentario->descricao}}</p>
                @if($comentario->respostas()->count() > 0)
                        @foreach($comentario->respostas as $resposta)
                            <p><span ><b>Respostas: </b></span>{{$resposta->descricao}}</p>
                        @endforeach
                @endif
                <form action="{{ route('comentario.responder',['comentario'=>$comentario])}}" method="POST">
                    {{ csrf_field() }}


                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="resposta">Resposta</label>

                            <textarea class="form-control {{$errors->has('resposta')?'parsley-error':''}}" name="resposta">{{old('resposta')}}</textarea>
                            @error('resposta')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>
                      </div>
                      <div class="form-row">


                      </div>
                    @if(isset($comentario))
                        <button type="submit" class="btn btn-warning">Responder</button>
                    @endif

                    <a href="{{route('postagem.editar',['postagem'=>$postagem,'pagina'=>'comentarios'])}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>


</div>

@stop
