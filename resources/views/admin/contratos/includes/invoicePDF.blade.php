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
            border-top: 1px solid #b9b9b9;
        }

        span{
            font-size: 11px;
        }
        .titulo{
            margin: 0;
            border-bottom: 1px solid #b9b9b9;
            font-size: 14px;
        }
        .w-full {
            width: 100%;
        }
        .w-half {
            width: 50%;
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
                <span><b>Telefone : </b><span class="text-small">{{$contrato->cliente->contatos()->first()->numero}}</span></span>
            </td>
            <td class="w-half">
                <h3 class="titulo">Cliente:</h3>
                <span><b>Nome : </b>{{$contrato->cliente->nome}}</span><br>
                <span><b>Telefone : </b><span class="text-small">{{$contrato->cliente->contatos()->first()->numero}}</span></span>
            </td>
            <td class="w-half">
                <h3 class="titulo">Cliente:</h3>
                <span><b>Nome : </b>{{$contrato->cliente->nome}}</span><br>
                <span><b>Telefone : </b><span class="text-small">{{$contrato->cliente->contatos()->first()->numero}}</span></span>
            </td>


        </tr>
    </table>
</div>

<div class="margin-top">
    <h3 class="titulo-produtos">Serviços</h3>
    <table class="products">
        <tr>
            <th style="width: 80%">Serviço</th>
            <th>Valor</th>

        </tr>
        <tr class="items">

                <td>
                   ada daw d
                </td>
                <td>
                    awd
                </td>


        </tr>
    </table>
    <div class="total">
        Total: $129.00 USD
    </div>
</div>

<div class="margin-top">
    <h3 class="titulo-produtos">Peças</h3>
    <table class="products">
        <tr>
            <th style="width: 80%">Peça</th>
            <th>Qnt</th>
            <th>Valor</th>

        </tr>
        <tr class="items">

            <td>
                ada daw d
            </td>
            <td>
                awd
            </td>
            <td>
               12
            </td>


        </tr>
    </table>
    <div class="total">
        Total: $129.00 USD
    </div>
</div>




<div class="footer margin-top">
    <div>Thank you</div>
    <div>&copy; Laravel Daily</div>
</div>
</body>
</html>
