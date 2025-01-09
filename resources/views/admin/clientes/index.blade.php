@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form method="get" action="{{route('cliente.pesquisar')}}">
                    <div class="form-row">
                       
                      <div class="form-group col-md-2">
                        <label for="inputEmail4">Nome</label>
                        <input type="text" class="form-control form-control-sm" name="nome" id="nome" placeholder="Nome">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputPassword4">Email</label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Email">
                      </div>
                      <div class="form-group col-md-1" style="float: right">
                        <label for="inputPassword4">Pesquisar</label>
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
                <h5 class="header-title">{{$titulo_tabela}}</h5>

                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%; min-width: 40px;" scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contato</th>
                                <th style="width: 8%; min-width: 60px;" scope="col">Cadastrado</th>
                                <th style="width: 3%; min-width: 40px;" scope="col">Editar</th>
                                <th style="width: 3%; min-width: 40px;" scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($clientes as $cliente)
                                <tr>
                                    <th scope="row">{{$cliente->id}}</th>
                                    <td>{{$cliente->nome}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>@.</td>
                                    <td>{{\Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y')}}</td>
                                    <td>@.</td>

                                    <td>@.</td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    {{$clientes->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
@stop
