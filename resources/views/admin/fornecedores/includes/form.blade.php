
<form action="{{isset($fornecedor)?route('fornecedor.atualizar'):route('fornecedor.cadastrar')}}" method="POST" class="{{$modal == 1?'form-modal-fornecedor':''}}">
    {{ csrf_field() }}
    @if(isset($fornecedor))
        <input hidden type="text" class="form-control" id="id-fornecedor" placeholder="" name="id" value="{{$fornecedor->id}}">
    @endif
    <div class="form-row">
        <div class="form-group col-lg-12">
            <label for="nome">Nome</label>
            <input type="text"  class="form-control @error('nome')is-invalid @enderror" id="Nome" placeholder="Nome" name="nome" value="{{isset($fornecedor)?$fornecedor->nome:''}}">
            <input  type="hidden" name="modal"   value="{{$modal == false?0:1}}">
            @error('nome')
            <div class="error">
                {{$message}}
            </div>
            @enderror
        </div>



    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="endereco">Endereço</label>
            <input type="text"  class="form-control" id="endereco" placeholder="endereco" name="endereco" value="{{isset($fornecedor)?$fornecedor->endereco:''}}">

        </div>
    </div>
    <div class="form-row">


    </div>


    @if($modal == false)
        @if(isset($fornecedor))
            <button type="submit" class="btn btn-warning">Editar</button>
        @else
            <button type="submit" class="btn btn-success">Cadastrar</button>
        @endif
        <a href="{{route('fornecedor.index')}}" class="btn btn-secondary">Voltar</a>
    @else
        @if(isset($fornecedor))
            <button type="submit" class="btn btn-warning btn-registro-fornecedor">Editar</button>
        @else
            <button  type="submit" class="btn btn-success btn-registro-fornecedor">Cadastrar</button>
        @endif
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

    @endif



</form>
