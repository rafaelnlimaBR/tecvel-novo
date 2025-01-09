@extends('admin.index')

@section('conteudo')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$titulo}}</h1>




                <!-- /.col-lg-6 -->
            </div>

        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pesquisa
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <form action="">
                                <div class="col-md-5 col-sm-6 col-lg-5 col-xl-5 col-5">

                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input class="form-control">
                                        </div>

                                </div>
                                <div class="col-md-5 col-sm-6 col-lg-5 col-xl-5 col-5">

                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-2 col-sm-12 col-lg-2 col-xl-2 col-12">

                                    <div class="form-group">
                                        <label>Pesquisar</label>
                                        <button class="form-control btn btn-primary" type="submit"><i class="fa fa-fw" aria-hidden="true" title=""></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$titulo_tabela}}
                        <a style="float: right" class="btn btn-primary btn-xs">Novo <i class="fa fa-fw" aria-hidden="true" title=""></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td class="acao"><a class="btn btn-warning btn-xs btn-acao"><i class="fa fa-fw" aria-hidden="true" title=""></i></a></td>
                                        <td class="acao"><a class="btn btn-danger btn-xs btn-acao" ><i class="fa fa-fw" aria-hidden="true" title=""></i></a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@stop
