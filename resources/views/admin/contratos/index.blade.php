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
                <h5 class="header-title ">{{$titulo_tabela}}<p style="float: right"><a href="{{ route('contrato.novo'    ) }}" style="color: white; font-size: 13px; text-transform: none" class="btn btn-primary btn-sm">Novo <i class="fa fa-plus-square"></i></a></p></h5>

                <div class="table-responsive-sm " id="tabela-refresh-contratos">
                    @include('admin.contratos.includes.table')
                    {{$contratos->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        setInterval(function () {
            var rota    =   "{{route('contrato.refresh')}}";
            $.ajax({
                header:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                url: rota,
                type: "get",
                success: function( data )
                {
                    $('#tabela-refresh-contratos').html(data.contratos);
                },
                error:function (data) {
                    console.log(data)
                }
            });
        }, 10000);

    </script>
@stop
