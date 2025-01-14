@extends('admin.index')

@section('conteudo')

<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form method="get" action="{{route('modelo.index')}}">
                    <div class="form-row">

                      <div class="form-group col-md-2">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control form-control-sm" value="{{request()->has('nome')?request()->get('nome'):''}}" name="nome" value="" id="nome" placeholder="Nome">
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
                <h5 class="header-title">{{$titulo_tabela}}<p style="float: right"><a href="{{ route('modelo.novo') }}" style="color: white; font-size: 7px; text-transform: none" class="btn btn-primary btn-sm">Novo <i class="fa fa-plus-square"></i></a></p></h5>

                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%; min-width: 40px;" scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Montadora</th>
                                <th style="width: 10%; min-width: 150px;"  scope="col">Criado </th>
                                <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($modelos as $modelo)
                                <tr>
                                    <th scope="row">{{$modelo->id}}</th>
                                    <td>{{$modelo->nome}}</td>
                                    <td>{{$modelo->montadora->nome}}</td>

                                    <td>{{\Carbon\Carbon::parse($modelo->created_at)->format('d/m/Y')}}</td>


                                    <td>
                                        <button class="btn btn-sm btn-primary" style="padding-top: 0; padding-bottom: 0"><i class="fa   fa-sign-out"></i></button>
                                        <a href="{{route('modelo.editar',['id'=>$modelo->id])}}" class="btn btn-sm btn-warning" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-pencil-square"></i></a>
                                        <button class="btn btn-sm btn-danger" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-trash-o"></i></button>


                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    {{$modelos->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
@stop
