@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-5 col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-body">
                <form action="{{ isset($cliente)? route('cliente.atualizar',['cliente'=>$cliente]):route('cliente.cadastrar') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control caixa-alta {{$errors->has('nome')?'parsley-error':''}}" id="Nome" placeholder="Nome" name="nome" value="{{old('nome',isset($cliente)?$cliente->nome:'')}}">
                          @error('nome')
                          <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                          @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="Email" class="form-control caixa-baixa {{$errors->has('email')?'parsley-error':''}}" id="Email" placeholder="Email" name="email" value="{{old('email',isset($cliente)?$cliente->email:'')}}">
                          @error('nome')
                          <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                          @enderror
                      </div>
                    </div>
                    @if(!isset($cliente))
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Telefone">Numero</label>
                            <input type="text"  class="form-control {{$errors->has('contato')?'parsley-error':''}}"  placeholder="Numero" name="contato" value="{{old('contato')}}">
                            @error('contato')
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="app">Aplicativo de Mensagem</label>
                            <select name="app" class="form-control">
                                @foreach($aplicativos as $app)
                                    <option value="{{$app->id}}">{{$app->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="cep">CEP</label>
                          <input type="text" class="form-control cep"  placeholder="Cep" id="cep" name="cep" value="{{old('cep',isset($cliente)?$cliente->cep:'')}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="logradouro">Logradoudo</label>
                          <input type="text" class="form-control"  placeholder="Logradoudo" id="rua" name="logradouro" value="{{old('logradouro',isset($cliente)?$cliente->endereco:'')}}">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="numero">Numero</label>
                          <input type="text" class="form-control"  placeholder="Numero"  name="numero" value="{{old('numero',isset($cliente)?$cliente->numero:'')}}">
                        </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="bairro">Bairro</label>
                              <input type="text" class="form-control"  placeholder="Bairro" id="bairro" name="bairro" value="{{old('bairro',isset($cliente)?$cliente->bairro:'')}}">
                          </div>
                        <div class="form-group col-md-4">
                          <label for="cidade">Cidade</label>
                          <input type="text" class="form-control"  placeholder="Cidade" id="cidade" name="cidade" value="{{old('cidade',isset($cliente)?$cliente->cidade:'')}}">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="estado">Estado</label>
                          <input type="text" class="form-control"  placeholder="Estado" id="uf" name="estado" value="{{old('estado',isset($cliente)?$cliente->estado:'')}}">
                        </div>

                      </div>
                    @if(isset($cliente))
                        <button type="submit" class="btn btn-warning">Editar</button>
                    @else
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    @endif
                    <a href="{{route('cliente.index')}}" class="btn btn-secondary">Voltar</a>


                </form>
            </div>

        </div>
    </div>
    @if (isset($cliente))
    <div class="col-lg-7 col-sm-12 col-md-12">
        @include('admin.contatos.formulario',['route_action'=>route('cliente.adicionar.contato'),'id'=>$cliente->id,'contatos'=>$cliente->contatos,'route_update'=>route('cliente.atualizar.contato'),"route_delete"=>route('cliente.excluir.contato')])
    </div>
    @endif

</div>

@stop
