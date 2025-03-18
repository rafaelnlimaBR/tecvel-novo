@extends('admin.index')

@section('conteudo')

<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form method="get" action="{{route('contrato.index')}}">
                    <div class="form-row">

                      <div class="form-group col-md-2">
                        <label for="nome">Cliente</label>
                        <input type="text" class="form-control form-control-sm" value="{{request()->has('nome')?request()->get('nome'):''}}" name="nome" id="nome" placeholder="Nome">
                      </div>
                        <div class="form-group col-md-1">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control form-control-sm" value="{{request()->has('telefone')?request()->get('telefone'):''}}" name="telefone" id="telefone" placeholder="Telefone">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="placa">Placa</label>
                            <input type="text" class="form-control form-control-sm placa" value="{{request()->has('placa')?request()->get('placa'):''}}" name="placa" id="placa" placeholder="Placa">
                        </div>

                      <div class="form-group col-md-1" style="float: right">
                        <label for="Pesquisar">Pesquisar</label>
                        <button type="submit" class="form-control form-control-sm btn btn-primary btn-sm"  ><i class="fa fa-search"></i></button>
                      </div>
                    </div>
              </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title ">{{$titulo_tabela}}<p style="float: right"><a href="{{ route('contrato.novo',['pagina'=>'dados']) }}" style="color: white; font-size: 13px; text-transform: none" class="btn btn-primary btn-sm">Novo <i class="fa fa-plus-square"></i></a></p></h5>

                <div class="table-responsive-sm " id="tabela-refresh-contratos">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th style="width: 5%; min-width: 40px;" scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Status</th>

                            <th style="width: 10%; min-width: 150px;"  scope="col">Criado </th>
                            <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($contratos as $contrato)
                            <tr>
                                <th scope="row">{{$contrato->id}}</th>
                                <td>{{$contrato->cliente->nome}}</td>
                                <td >{{isset($contrato->veiculo)?$contrato->veiculo->placa:"ND"}}  </td>
                                <td>{{isset($contrato->veiculo)?$contrato->veiculo->modelo->nome:"ND"}}</td>
                                <td style="width: 7%;"><span style="background-color: {{$contrato->historicos->last()->status->cor_fundo}}; color: {{$contrato->historicos->last()->status->cor_letra}}; padding: 3px 5px 3px 5px;border-radius: 10px;">{{$contrato->historicos->last()->status->nome}}</span></td>

                                <td style="width: 7%;">{{\Carbon\Carbon::parse($contrato->created_at)->format('d/m/Y')}}</td>


                                <td>
{{--                                    <a href="{{route('contrato.visualizacao',['id'=>$contrato->id])}}" class="btn btn-sm btn-primary" style="padding-top: 0; padding-bottom: 0"><i class="fa   fa-sign-out"></i></a>--}}
                                    <a class="btn-sm btn-success" href="{{route('contrato.enviar.invoice.aplicativos',['id'=>$contrato->id])}}" style="padding-top: 0; padding-bottom: 0"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                    <a href="{{route('contrato.abrir',['token'=>$contrato->tokens->last()->token,'id'=>$contrato->id])}}" class="btn btn-sm btn-primary" style="padding-top: 0; padding-bottom: 0"><i class="fa   fa-sign-out"></i></a>
                                    <a href="{{route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'dados'])}}" class="btn btn-sm btn-warning" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-pencil-square"></i></a>
                                    <button class="btn btn-sm btn-danger" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-trash-o"></i></button>


                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{$contratos->links()}}

                </div>

            </div>
        </div>
    </div>
</div>
@stop
