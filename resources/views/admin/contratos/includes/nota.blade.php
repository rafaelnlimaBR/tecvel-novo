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
                    <a class="btn btn-sm btn-primary" style="color: white" id="btn-camera">camera</a> ou
                    <input type="file" accept="image/*" class="profile_picture_file_input" id="profile_picture_file_upload" capture>

                </div>
            </div>
        </div>
        @endif

    </div>
@include("admin.contratos.includes.camera")
@stop
