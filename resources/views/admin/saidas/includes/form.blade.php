<form action="{{ isset($saida)? route('saida.atualizar'):route('saida.cadastrar') }}" method="POST">
    {{ csrf_field() }}
    @if(isset($saida))
        <input hidden type="text" class="form-control" id="id-saida" placeholder="" name="id" value="{{$saida->id}}">
    @endif
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Nome">Nome</label>
            <input type="text" required class="form-control caixa-alta" id="Nome" placeholder="Nome" name="nome" value="{{isset($saida)?$saida->nome:''}}">
        </div>



    </div>
    <div class="form-row">

    </div>
    <div class="form-row">


    </div>
    @if(isset($saida))
        <button type="submit" class="btn btn-warning">Editar</button>
    @else
        <button type="submit" class="btn btn-success">Cadastrar</button>
    @endif
    <a href="{{route('saida.index')}}" class="btn btn-secondary">Voltar</a>


</form>
