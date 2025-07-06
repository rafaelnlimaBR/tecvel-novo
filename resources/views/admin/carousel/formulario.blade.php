@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-8 col-sm-8 col-md-8">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($banner)? route('banner.atualizar',['carousel'=>$banner]):route('banner.cadastrar') }}" method="POST"   enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Título</label>
                        <input type="text"  class="form-control {{$errors->has('titulo')?'parsley-error':''}}"  placeholder="Título" name="titulo" value="{{old('titulo',isset($banner)?$banner->titulo:'')}}">
                          @error('titulo')
                          <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                          @enderror
                      </div>


                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Texto</label>
                            <textarea  class="form-control {{$errors->has('texto')?'parsley-error':''}}"  name="texto" >{{old('texto',isset($banner)?$banner->texto:'')}}</textarea>
                            @error('texto')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Imagem 1947x843</label>

                            <input type="file" class="form-control {{$errors->has('imagem')?'parsley-error':''}}"  name="imagem" >
                            @error('imagem')
                            <ul class="parsley-errors-list filled"><li class="parsley-required" >{{$message}}</li></ul>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Alt</label>

                            <input type="text" class="form-control "  name="alt" value="{{old('alt',isset($banner)?$banner->alt:'')}}">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputEmail4">Possui Link?</label>

                            <input type="checkbox" {{isset($banner)?$banner->tem_link?'checked':'':''}} class="form-control"   name="possui_link" value="{{isset($banner)?$banner->tem_link:''}}">
                        </div>
                        <div class="form-group col-md-7">
                            <label for="inputEmail4">Link</label>
                            <input type="text"  class="form-control"  placeholder="Link" name="link" value="{{isset($banner)?$banner->link:''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Sequência</label>
                            <select type="text"  class="form-control"   name="sequencia" >
                                @for($i=0;$i<$total_registros;$i++)
                                    @if(isset($banner))
                                        @if($banner->sequencia == $i)
                                            <option selected value="{{$i}}">{{$i}}</option>
                                        @else
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endif
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor

                            </select>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputEmail4">Ativo?</label>

                            <input type="checkbox"  {{isset($banner)?$banner->ativo?'checked':'':''}} class="form-control"   name="ativo" >
                        </div>



                    </div>

                    @if(isset($banner))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('banner.index')}}" class="btn btn-secondary">Voltar</a>


                  </form>
            </div>

        </div>
    </div>
    @if(isset($banner))
        <div class="col-lg-4">
            <img  src="{{URL::asset('images/banners/'.$banner->imagem)}}" alt="" class="img-fluid ">
        </div>

    @endif



</div>

@stop
