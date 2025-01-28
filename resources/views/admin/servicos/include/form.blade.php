
    {{ csrf_field() }}
    @if(isset($servico))
        <input hidden type="text" class="form-control" id="id-servico" placeholder="" name="id" value="{{$servico->id}}">
    @endif
    @if(isset($modal))
        <input hidden type="text" name="modal" value="1">
    @endif
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nome">Nome</label>
            <input type="text" required class="form-control caixa-alta"  placeholder="Nome" id="nome-servico" name="servico" value="{{isset($servico)?$servico->nome:''}}">
        </div>
        <div class="form-group col-md-4">
            <label for="valor">Valor</label>
            <input type="text" required class="form-control" placeholder="Valor" id="valor-servico" name="valor" value="{{isset($servico)?$servico->valor:''}}">
        </div>

    </div>
    <div class="form-row">

    </div>
    <div class="form-row">


    </div>
    @if(isset($servico))
        <button type="submit" class="btn btn-warning">Editar</button>
    @else
        <button type="submit" class="btn btn-success">Cadastrar</button>
    @endif
    @if(isset($modal)==false)
    <a href="{{route('servico.index')}}" class="btn btn-secondary">Voltar</a>
    @else
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    @endif


