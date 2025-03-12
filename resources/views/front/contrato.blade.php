<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mannat Themes">
    <meta name="keyword" content="">

    <title>TECVEL | {{$titulo}}</title>

</head>

<body class="sticky-header">
@if(isset($contrato))
    <h5>Cliente: {{$contrato->cliente->nome}}</h5>
    <h5>Veículo: {{$contrato->veiculo->placa}}</h5>

    @foreach ($contrato->historicos as $historico)
        @foreach($historico->servicos as $servico)
            <h6>{{$servico->nome}}</h6>
        @endforeach

    @endforeach
@endif
@if(isset($alerta))

    <div style="margin-top: 10px" class="alert alert-{{$alerta['tipo']}} alert-dismissible fade show" role="alert">
        {{$alerta['texto']}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
</body>
