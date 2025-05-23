@extends('admin.index')

@section('conteudo')

    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>
    <div class="row botoes" style="margin: 10px">
        <div class="col-md-12">
            <a class="btn btn-default" style="background-color: #aeaeae; color: white" href="{{route('contrato.index')}}">Voltar</a>
            <a class="btn btn-success" style="background-color: #aeaeae; color: white" href="{{route('contrato.enviar.invoice.aplicativos',['contrato'=>$contrato])}}">Enviar Whatsapp</a>
            <a class="btn btn-success" style="background-color: #aeaeae; color: white" href="{{route('contrato.enviar.invoice.email',['contrato'=>$contrato])}}">Enviar Email</a>
            <a class="btn btn-success" style="background-color: #aeaeae; color: white" href="{{route('contrato.baixar.pdf',['contrato'=>$contrato])}}">Baixar PDF</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="row cabecalho">
                        <div class="col-md-3 borda-direita">
                                <h4>LOGO</h4>
                        </div>
                        <div class="col-md-3 borda-direita">
                            <h4>Cliente</h4>
                            <b>Nome: </b>Teste<br>
                            <b>Telefone: </b>85888888888<br>
                            <b>Email: </b>rafafa@gmail.com<br>
                        </div>
                        <div class="col-md-3 borda-direita">
                            <h4>Veículo</h4>
                            <b>Modelo: </b>Gol<br>
                            <b>Placa: </b>HUI3024<br>
                            <b>Cor: </b>BRANCO<br>
                            <b>Montadora: </b>ford<br>
                        </div>
                        <div class="col-md-3 ">
                            <h3>OS : <b>1313</b></h3>

                            <h5><b>Garantia</b> : 25/05/2025</h5><br>
                        </div>
                    </div>
                    <div class="row historicos">
                        <div class="col-md-8">
                            <h4 class="titulo">Histórico</h4>
                            <table class="tabela-historico table table-bordered ">
                                <thead>
                                <tr>
                                    <th style="width: 15%">Status</th>
                                    <th style=" width: 15%">Data</th>
                                    <th>Obs</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contrato->historicos as $historico)
                                    <tr>
                                        <td class="tabela-pagamento-titulo">{{$historico->status->nome}}</td>
                                        <td class="tabela-pagamento-resultado">{{\Carbon\Carbon::parse($historico->data)->format('d/m/Y')}}</td>
                                        <td class="tabela-pagamento-resultado">{{$historico->obs}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-4">
                            <p class="texto"><b>Defeito:  </b>da dawdm aklda klçdnakwd klçawdkla nldwlkna dnkal kda dawdm aklda klçdnakwd klçawdkla nldwlkna dnkal kda dawdm aklda klçdnakwd klçawdkla nldwlkna dnkal k
                                da dawdm aklda klçdnakwd klçawdkla nldwlkna dnkal kda dawdm aklda klçdnakwd klçawdkla nldwlkna dnkal kda dawdm aklda klçdnakwd klçawdkla nldwlkna dnkal k
                                da dawdm aklda klçdnakwd klçawdkla nldwlkna dnkal kda dawdm aklda klçdnakwd klçawdkla nldwlkna dnkal k</p>
                        </div>
                    </div>
                    @if($contrato->historicos->map->notas->flatten()->count() > 0)
                        <div class="row notas">
                            <div class="col-md-12">
                                <h4 class="titulo">Notas</h4>
                                <table class="tabela-notas table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th style="width: 15%">Tipo</th>
                                        <th style=" width: 15%">Criado</th>
                                        <th>Obs</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contrato->historicos as $historico)
                                        @foreach($historico->notas as $nota)
                                            <tr>
                                                <td class="">{{$nota->tipo->nome}}</td>
                                                <td class="">{{\Carbon\Carbon::parse($nota->created_at)->format('d/m/Y')}}</td>
                                                <td class="">{{$nota->texto}}</td>

                                            </tr>
                                        @endforeach

                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    @endif
                    <div class="row servicos">

                        <div class="col-md-12">
                            <h4 class="titulo">Serviços</h4>
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Nome do Serviço</th>
                                        <th style="width: 20%">Valor</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>R$ 150,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>R$ 150,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>R$ 150,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>R$ 150,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>R$ 150,00</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row pecas">

                        <div class="col-md-12">
                            <h4 class="titulo">Peças</h4>
                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <th>Nome da Peça</th>
                                    <th>Marca</th>
                                    <th style="width: 10%">Qnt</th>
                                    <th style="width: 15%">Valor Unitário</th>
                                    <th style="width: 15%">Valor Total</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>Original </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>Original </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>Original </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>Original </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="titulo">Valores</h4>
                            <table class="tabela-pagamento table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="tabela-pagamento-titulo">Total Serviços</td>
                                    <td class="tabela-pagamento-resultado">R$ 300.00</td>
                                </tr>
                                <tr>
                                    <td  class="tabela-pagamento-titulo">Total Peças</td>
                                    <td class="tabela-pagamento-resultado">R$ 300.00</td>
                                </tr>
                                <tr>
                                    <td  class="tabela-pagamento-titulo">Total Pago</td>
                                    <td class="tabela-pagamento-resultado">R$ 0.00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <h4 class="titulo">Pagamentos</h4>
                            <table class="tabela-pagamento table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="tabela-pagamento-titulo">Total Serviços</td>
                                    <td class="tabela-pagamento-resultado">R$ 300.00</td>
                                </tr>
                                <tr>
                                    <td  class="tabela-pagamento-titulo">Total Peças</td>
                                    <td class="tabela-pagamento-resultado">R$ 300.00</td>
                                </tr>
                                <tr>
                                    <td  class="tabela-pagamento-titulo">Total Pago</td>
                                    <td class="tabela-pagamento-resultado">R$ 0.00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .borda-direita{border-right: 2px solid #c3c3c3}
        .cabecalho{height: 150px}
        .titulo{padding: 10px; border-bottom: 1px solid #ebebeb; border-top: 1px solid #c3c3c3; background-color: #f6f6f6;margin-top: 10px}

        .texto{padding: 20px}
    </style>

@stop
