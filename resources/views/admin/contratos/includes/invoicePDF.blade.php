<html>
@include('admin.includes.header-html')
<body>
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{URL::asset('/images/logo.png')}}" alt="" height="90">
                    </div>
                    <div class="col-lg-3">
                        <h5>Cliente</h5>
                        <span class="cabecalho" id="nome-cliente"><b>Nome : </b>{{$contrato->cliente->nome}}</span><br>
                        <span class="cabecalho" id="telefone-cliente"><b>Telefone : </b>{{$contrato->cliente->contatos()->first()->numero}}</span><br>
                        <span class="cabecalho" id="email-cliente"><b>Email : </b>{{$contrato->cliente->email}}</span><br>
                    </div>
                    <div class="col-lg-3">
                        <h5>Veículo</h5>
                        <span class="cabecalho" id="placa-veiculo"><b>Placa : </b>{{$contrato->veiculo->placa}}</span><br>
                        <span class="cabecalho" id="modelo-veiculo"><b>Modelo : </b>{{$contrato->veiculo->modelo->nome}}</span><br>
                        <span class="cabecalho" id="montadora-veiculo"><b>Montadora : </b>{{$contrato->veiculo->modelo->montadora->nome}}</span><br>
                    </div>
                    <div class="col-lg-3">
                        <h5>{{$contrato->status->last()->nome}}</h5>
                        <span class="cabecalho" id="identificacao"><b>ID : </b>{{$contrato->id}}</span><br>
                        <span class="cabecalho" id="criado"><b>Criado : </b>{{\Carbon\Carbon::parse($contrato->created_at)->format('d/m/Y')}}</span><br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('admin.includes.scripts')
</body>
</html>
