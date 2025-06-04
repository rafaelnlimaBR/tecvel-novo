@extends('admin.index')

@section('conteudo')

<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form method="get" action="{{route('postagem.index')}}">
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
                <h5 class="header-title">{{$titulo_tabela}}<p style="float: right"><a href="{{ route('postagem.novo',['pagina'=>'postagem']) }}" style="color: white; font-size: 13px; text-transform: none" class="btn btn-primary btn-sm">Novo <i class="fa fa-plus-square"></i></a></p></h5>

                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 5%; min-width: 40px;" scope="col">#</th>
                                <th style="width: 5%; min-width: 8px;" scope="col">Imagem</th>
                                <th scope="col">Titulo</th>
                                <th style="width: 15%; " scope="col">Por</th>
                                <th style="width: 8%; " scope="col">Visitas</th>
                                <th style="width: 8%; " scope="col">Comentários</th>
                                <th style="width: 7%; " scope="col">Status</th>
                                <th style="width: 10%; min-width: 150px;"  scope="col">Criado </th>
                                <th style="width: 7%; min-width: 150px;" scope="col">Ações</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($postagens as $postagem)
                                <tr>
                                    <th scope="row">{{$postagem->id}}</th>
                                    <td> <img src="{{URL::asset('/images/postagens/'.$postagem->imagem)}}" alt="" height="30"></td>
                                    <td>{{substr($postagem->titulo,0,40)}}...</td>
                                    <td>{{$postagem->usuario->name}}</td>
                                    <td>{{$postagem->visitas}}</td>
                                    <td>{{$postagem->comentarios()->count()}}</td>
                                    <td>{{$postagem->ativo==true?'Ativo':"Inativo"}}</td>

                                    <td>{{\Carbon\Carbon::parse($postagem->created_at)->format('d/m/Y')}}</td>


                                    <td>
                                        <button class="btn btn-sm btn-primary" style="padding-top: 0; padding-bottom: 0"><i class="fa   fa-sign-out"></i></button>
                                        <a href="{{route('postagem.editar',['postagem'=>$postagem,'pagina'=>'postagem'])}}" class="btn btn-sm btn-warning" style="padding-top: 0; padding-bottom: 0"><i class="fa  fa-pencil-square"></i></a>
                                        <a href="{{route('postagem.excluir',['postagem'=>$postagem])}}" class="btn btn-sm btn-danger" style="padding-top: 0; padding-bottom: 0" onclick="return confirm('Deseja excluir esse registro?')"><i class="fa  fa-trash-o"></i></a>


                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    {{$postagens->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
@stop
