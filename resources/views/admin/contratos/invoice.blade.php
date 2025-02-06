@extends('admin.index')

@section('conteudo')

    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
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
                                    <th style="width: 10%">Qnt</th>
                                    <th style="width: 15%">Valor Unitário</th>
                                    <th style="width: 15%">Valor Total</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>
                                    <tr>
                                        <td>Reparo do painel de instrumentos </td>
                                        <td>3</td>
                                        <td>R$ 100</td>
                                        <td>R$ 300,00</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p><b>OBS: </b> awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn
                                awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn
                                awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn
                                awd ad awdad ljf skjfl asjkf asf asdjfnasdjn sanjjn awd ad awdad ljf skjfl asjkf as</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Pagamentos</h4>
                            <table class="tabela-pagamento table">
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
        .borda-direita{border-color: #c3c3c3;border-right-style: solid}
        .cabecalho{height: 150px}
        .titulo{padding: 15px}
        .tabela-pagamento td{padding: 5px; }
        .tabela-pagamento tr{border-bottom-style: solid; border-bottom-color: #bebebe}
    </style>

@stop
