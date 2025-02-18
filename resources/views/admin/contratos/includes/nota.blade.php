@extends('admin.index')

@section('conteudo')
    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>

    <div class="row">
        <div class="col-lg-7 col-sm-7 col-md-7">
            <div class="card ">
                <div class="card-body">
                    <form action="{{ isset($nota)? route('contrato.atualizar.nota'):route('contrato.cadastrar.nota') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="contrato_id" value="{{$contrato->id}}" >
                        @if(isset($nota))
                            <input hidden type="text" class="form-control" id="id-nota" placeholder="" name="id" value="{{$nota->id}}">
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipo_nota">Historicos</label>
                                <select class="form-control" name="historico">
                                    @foreach($contrato->historicos     as  $historico)
                                        @if(isset($nota))
                                            @if($nota->historico_id  == $historico->id)
                                                <option selected value="{{$historico->id}}">{{\Carbon\Carbon::parse($historico->data)->format('d/m/Y'). ' - '.$historico->status->nome}}</option>
                                            @else
                                                <option value="{{$historico->id}}">{{\Carbon\Carbon::parse($historico->data)->format('d/m/Y'). ' - '.$historico->status->nome}}</option>
                                            @endif
                                        @else

                                            @if($historico_id == $historico->id)
                                                <option selected value="{{$historico->id}}">{{\Carbon\Carbon::parse($historico->data)->format('d/m/Y'). ' - '.$historico->status->nome}}</option>
                                            @else
                                                <option value="{{$historico->id}}">{{\Carbon\Carbon::parse($historico->data)->format('d/m/Y'). ' - '.$historico->status->nome}}</option>
                                            @endif

                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipo_nota">Tipo de nota</label>
                                <select class="form-control" name="tipo_nota">
                                    @foreach($tipos_notas     as  $tipo)
                                        @if(isset($nota))
                                            @if($nota->tipo_nota_id  == $tipo->id)
                                                <option selected value="{{$tipo->id}}">{{$tipo->nome}}</option>
                                            @else
                                                <option  value="{{$tipo->id}}">{{$tipo->nome}}</option>
                                            @endif
                                        @else
                                                <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="texto">Descrição</label>
                                <textarea  required name="texto" class="form-control" id="texto-notesummer">{{isset($nota)?$nota->texto:''}}</textarea>
                            </div>


                        </div>
                        <div class="form-row">

                        </div>
                        <div class="form-row">


                        </div>
                        @if(isset($nota))
                            <button type="submit" class="btn btn-warning">Editar</button>
                            <a onclick="return confirm('Deleseja excluir esse registro?')" class="btn btn-danger float-right" href="{{route('contrato.excluir.nota',['id'=>$nota->id])}}">Excluir</a>
                        @else
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        @endif
                        <a href="{{route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$contrato->historicos->last()->id,'pagina'=>'notas'])}}" class="btn btn-secondary">Voltar</a>


                    </form>
                </div>

            </div>



        </div>
        @if(isset($nota))
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{route('contrato.adicionar.imagens')}}" enctype="multipart/form-data" >
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="texto">Imagem ou Foto</label>
                                @csrf
                                <input required type="file" accept="image/*;capture=camera" name="imagens[]" class="form-control" multiple>
                                <input type="hidden" name="id" value="{{$nota->id}}">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descricao">Descrição</label>

                                    <textarea class="form-control"  name="descricao"></textarea>


                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>

                    <table style="margin-top: 15px" class="table table-bordered">
                        <thead>
                            <tr>
                                <td style="width: 20%">Nome</td>
                                <td>Texto</td>
                                <td style="width: 10%">Editar</td>
                                <td style="width: 10%">Excluir</td>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($nota->imagens as $imagem)
                            <tr>
                                <form method="post" action="{{route('contrato.atualizar.imagens')}}">
                                    <td><img style="height: 60px" src="{{url('/images/notas/'.$imagem->nome)}}" alt="Image"/></td>
                                    <td>
                                        <textarea name="texto" class="form-control" imagem-id="{{$imagem->id}}">{{$imagem->texto}}</textarea>
                                        <input hidden name="id" value="{{$imagem->id}}">
                                        {{ csrf_field() }}
                                    </td>
                                    <td><button  type="submit" href="#" class="btn btn-warning btn-sm">Editar</button>  </td>
                                    <td><a  type="submit" href="{{route('contrato.excluir.imagens',['id'=>$imagem->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir esse registro?')">Excluir</a>  </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @endif

    </div>




@stop
