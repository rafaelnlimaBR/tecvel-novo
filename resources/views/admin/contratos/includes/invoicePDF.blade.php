<!DOCTYPE html>
<html lang="pt-br">
<head>

    <link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>

        table{width: 100%;}
        .cabecalho{height:150px}
        .corpo{margin: 7px}
    </style>
</head>
<body>
<div class="container invoice">
    <div class="invoice p-3 mb-3">

        <div class="row">
            <div class="col-12">
                <h4>

                    <small class="float-right">{{date('d/m/Y', strtotime(\Carbon\Carbon::now()))}}</small>
                </h4>
            </div>

        </div>

        <div class="row invoice-info">
            <div class="col-sm-3 invoice-col">
                @if (isset($conf))
                    @if($conf->logo != "")
                    <img loading="lazy" style="height: 100px; margin:35px 0 0 15px"  src="{{url('imagens/'.$conf->logo)}}" alt="logo-tecvel">
                    @endif
                @endif

            </div>
            <div class="col-sm-3 invoice-col">
                @if (isset($conf))
                <address>
                    <strong>{{$conf->nome_empresa}}</strong><br>
                    {{$conf->endereco}}<br>
                    Telefone: {{$conf->telefone_movel}}<br>
                    Email: {{$conf->email}}<br>

                </address>
                @endif
            </div>

            <div class="col-sm-3 invoice-col">

                <address>
                    <strong>{{$contrato->cliente->nome}}</strong><br>
                    <span style="font-size: 11px">
                        @foreach ($contrato->cliente->contatos as $contato)
                            {{ $contato->numero }}
                        @endforeach
                    </span>

                    <br>
                    Veículo: {{$contrato->veiculo->modelo->nome}}<br>
                    Placa:<strong> {{$contrato->veiculo->placa}}</strong><br>

                </address>
            </div>

            <div class="col-sm-3 invoice-col">
                <b>ID #{{$contrato->id}}</b><br>
                <b>Data: </b>{{date('d/m/Y', strtotime($contrato->created_at))}}
                @if (isset($conf))
                    @if($contrato->historicos->last()->tipo->id != $conf->orcamento)
                    <br>
                    <b>Garantia: </b> {{date('d/m/Y', strtotime($contrato->data_fim_garantia))}}
                    @endif
                @endif
                <br>


            </div>

        </div>

        <div class="row">
            <div class="col-12 table-responsive">


                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Serviço





                        </th>
                        <th style="width: 20%">Valor</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($contrato->historicos as $historico)
                            @foreach ($historico->servicos as $servico)
                                <tr>
                                    <td>{{$servico->nome}}</td>
                                    <td>R$ {{$servico->pivot->valor}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


        <div class="row">
            <div class="col-12 table-responsive">


                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Peça|
                        </th>
                        <th>Qnt</th>
                        <th>Valor</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (isset($conf))
                        @if($contrato->historicos->last()->tipo->id != $conf->orcamento)
                            @foreach($contrato->historicos as $h)
                                @foreach($h->pecas as $peca)
                                    <tr>
                                        <td style="{{$peca->pivot->autorizado == 0?"text-decoration:line-through":""}};">{{$peca->descricao}}</td>
                                        <td style="{{$peca->pivot->autorizado == 0?"text-decoration:line-through":""}};">{{$peca->pivot->qnt}}</td>
                                        <td style="{{$peca->pivot->autorizado == 0?"text-decoration:line-through":""}};">R$ {{$peca->pivot->valor}}</td>
                                        <td style="{{$peca->pivot->autorizado == 0?"text-decoration:line-through":""}};">R$ {{$peca->pivot->valor*$peca->pivot->qnt}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @else
                            @foreach($contrato->historicos->last()->pecas as $peca)
                                <tr>
                                    <td>{{$peca->descricao}}</td>
                                    <td>{{$peca->pivot->qnt}}</td>
                                    <td>R$ {{$peca->pivot->valor}}</td>
                                    <td>R$ {{$peca->pivot->valor*$peca->pivot->qnt}}</td>
                                </tr>
                            @endforeach

                        @endif
                    @endif
                    </tbody>
                </table>
            </div>

        </div>

        <div class="row">

            <div class="col-6">
                <p class="lead">Forma de Pagamentos:</p><br>
                <p>Pix, Cartão de crédito, Débito, Dinheiro</p>

            </div>

            <div class="col-6" >
                <p class="lead">Valores</p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>R$ </td>
                            </tr>

                            <tr>
                                <th>Serviços </th>
                                <td>R$ </td>
                            </tr>


                            <tr>
                                <th>Peças</th>
                                <td>R$ </td>
                            </tr>

                            <tr>
                                <th>Total:</th>
                                <td>R$</td>
                            </tr>
                            <tr>


                                   <th>Pago:</th>
                                    <td>R$ </td>



                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>



    </div>




</div>
</body>
</html>
