@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-5 col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-body">
                <form action="{{ route('cliente.cadastrar') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome</label>
                        <input type="Nome" class="form-control" id="Nome" placeholder="Nome" name="nome">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="InputEmail">Email</label>
                        <input type="Email" class="form-control" id="Email" placeholder="Email" name="email">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar</button>


                  </form>
            </div>

        </div>
    </div>
    @if (isset($cliente))
    <div class="col-lg-7 col-sm-12 col-md-12">
        @include('admin.contatos.formulario',[$cliente->$contatos])
    </div>
    @endif

</div>

@stop
