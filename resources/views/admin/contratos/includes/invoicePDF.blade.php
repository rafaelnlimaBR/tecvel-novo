<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .titulo-produtos{
            margin: 3px;
            /*border-top: 1px solid #b9b9b9;*/
        }
        .texto-pequeno{
            font-size: 9px;
        }

        span{
            font-size: 11px;
        }
        .titulo{
            margin: 0;
            /*border-bottom: 1px solid #b9b9b9;*/
            font-size: 14px;
        }
        .w-full {
            width: 100%;
            border-bottom: 1px solid #b9b9b9;
        }
        .w-half {
            width: 50%;
            height: 90px;

        }
        .margin-top {
            margin-top: 1.25rem;
        }
        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        table.products {
            font-size: 0.875rem;
        }
        table.products tr {
            background-color: #848484;
        }
        table.products th {
            color: #ffffff;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: rgb(241 245 249);

        }
        table tr.items td {
            padding: 0.5rem;
            border-bottom: 1px solid #38383a;
        }
        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
<table class="w-full">
    <tr>
        <td class="w-half">
            <img src="{{ public_path('images/logo.png') }}"height="70" />
        </td>
        <td class="w-half">
            <h2>ID: {{$contrato->id}}</h2>
        </td>
    </tr>
</table>

<div class="margin-top">
    <table class="w-full">
        <tr>
            <td class="w-half">
                <h3 class="titulo">Cliente:</h3>
                <span><b>Nome : </b>{{$contrato->cliente->nome}}</span><br>
                <span ><b>Email : </b><span class="texto-pequeno">{{$contrato->cliente->email}}</span></span><br>
                <span><b>Telefone : </b><span class="text-small">{{$contrato->cliente->contatos()->first()->numero}}</span></span>
            </td>
            <td class="w-half">
                <h3 class="titulo">Veículo:</h3>
                <span><b>Placa : </b>{{$contrato->veiculo->placa}}</span><br>
                <span><b>Marca : </b><span class="text-small">{{$contrato->veiculo->modelo->nome}}</span></span><br>
                <span><b>Montadora : </b><span class="text-small">{{$contrato->veiculo->modelo->montadora->nome}}</span></span>
            </td>
            <td class="w-half">
                <h3 class="titulo">Cliente:</h3>
                <span><b>Nome : </b>{{$contrato->cliente->nome}}</span><br>
                <span><b>Telefone : </b><span class="text-small">{{$contrato->cliente->contatos()->first()->numero}}</span></span>
            </td>


        </tr>
    </table>
</div>
@if($contrato->historicos->map->servicos->flatten()->count() > 0)
<div class="margin-top">
    <h3 class="titulo-produtos">Serviços <span style="font-size: 11px">Total: R$ {{$contrato->totalServicosLiquido()}}</span></h3>
    <table class="products">
        <tr>
            <th style="width: 80%">Serviço</th>
            <th>Valor</th>

        </tr>
        @foreach($contrato->historicos->map->servicos->flatten() as $servico)
        <tr class="items">

                <td>
                    {{$servico->nome}}
                </td>
                <td>
                    {{$servico->pivot->valor_liquido}}
                </td>


        </tr>
        @endforeach
    </table>
    <div class="total">

    </div>
</div>
@endif
@if($contrato->historicos->map->pecas->flatten()->count() > 0)
<div class="margin-top">
    <h3 class="titulo-produtos">Peças <span style="font-size: 11px">Total: R$ {{$contrato->totalPecasAvulsasLiquido()}}</span></h3>
    <table class="products">
        <tr>
            <th style="width: 60%">Peça</th>
            <th>Qnt</th>
            <th>Valor</th>
            <th>Valor Total</th>

        </tr>
        @foreach($contrato->historicos->map->pecas->flatten() as $peca)
        <tr class="items">

            <td>
                {{$peca->nome}}
            </td>
            <td>
                {{$peca->pivot->qnt}}
            </td>
            <td>
                {{$peca->pivot->valor_liquido}}
            </td>
            <td>
                {{$peca->pivot->valor_liquido_total}}
            </td>


        </tr>
        @endforeach
    </table>
    <div class="total">
        Total: $129.00 USD
    </div>
</div>
@endif




<div class="footer margin-top">
    <div>Thank you</div>
    <div>&copy; Laravel Daily</div>
</div>
</body>
</html>
