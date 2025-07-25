@extends('admin.index')

@section('conteudo')
    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5>Data: {{\Carbon\Carbon::parse($mensagem->created_at)->format('d/m/Y H:i')}}</h5>
                    <h4>Cliente: {{$mensagem->cliente->nome}}</h4>
                    @foreach($mensagem->cliente->contatos as $contato)
                        <h6>Contato: {{$contato->numero}}</h6>
                    @endforeach
                    <h4>Texto: {{$mensagem->texto}}</h4>
                </div>
            </div>
        </div>
    </div>

@endsection
