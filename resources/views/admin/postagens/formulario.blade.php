@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>

</div>

<div class="row">
    <div class="col-lg-8 col-sm-8 col-md-8">

        <div class="card ">

            <div class="card-body">

                <form action="{{ isset($postagem)? route('postagem.atualizar',['postagem'=>$postagem]):route('postagem.cadastrar') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="ativo">Ativo</label>
                            <select name="ativo" class="form-control {{$errors->has('ativo')?'parsley-error':''}}" >
                                @if(isset($postagem))
                                    @if($postagem->ativo == '1')
                                        <option value="1" selected>Sim</option>
                                        <option value="0">Não</option>
                                    @else
                                        <option value="1" >Sim</option>
                                        <option value="0" selected>Não</option>
                                    @endif
                                @else
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                @endif
                            </select>

                            @error('ativo')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>
                      <div class="form-group col-md-10">
                        <label for="titulo">Titulo</label>
                        <input type="text"  class="form-control {{$errors->has('titulo')?'parsley-error':''}}" id="titulo" placeholder="titulo" name="titulo" value="{{old('titulo',isset($postagem)?$postagem->titulo:"")}}">
                          @error('titulo')
                          <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                          @enderror
                      </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="alt">Alt </label>
                            <input type="text"  class="form-control {{$errors->has('alt')?'parsley-error':''}}"  name="alt" value="{{old('alt',isset($postagem)?$postagem->alt:'')}}">
                            @error('alt')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="imagem">Imagem 1024x768</label>
                            <input type="file"  class="form-control {{$errors->has('imagem')?'parsley-error':''}}"  name="imagem" >
                            @error('imagem')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <label for="categorias">Categorias </label>
                            <select multiple class="form-control {{$errors->has('categorias')?'parsley-error':''}}" name="categorias[]">
                                @foreach($categorias as $categoria)
                                    @if(isset($postagem))
                                        @if($postagem->categorias()->find($categoria->id))
                                            <option selected value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                        @else
                                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                        @endif
                                    @else
                                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                    @endif

                                @endforeach
                            </select>

                            @error('categorias')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>
                        <div class="form_group col-md-6">
                            <label for="tags">Tags</label>
                            <textarea   id="tags" name="tags"  class="form-control {{$errors->has('tags')?'parsley-error':''}}"  >{{old('tags',isset($postagem)?$postagem->tags:'')}}</textarea>
                            @error('tags')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror

                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="texto">Texto</label>
                            <textarea type="text"  class="form-control texto-notesummer {{$errors->has('texto')?'parsley-error':''}}"  name="texto" >{{old('texto',isset($postagem)?$postagem->descricao:'')}}</textarea>
                            @error('texto')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>
                    </div>

                    @if(isset($postagem))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('postagem.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>

            </div>

        </div>
    </div>
    @if(isset($postagem))
    <div class="col-lg-4">

            <div class="card ">
                <div class="card-body">
                    <img src="{{URL::asset('/images/postagens/'.$postagem->imagem)}}" alt="" class="img-fluid" >
                </div>
            </div>


    </div>
    @endif


</div>

@stop
