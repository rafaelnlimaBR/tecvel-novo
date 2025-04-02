@extends('admin.index')

@section('conteudo')

{{-- VARIAVEIS PASSADAS POR PARAMETRO AO CHAMAR ESSE FORMULARIO    routeAaction:routeUpdate:routeBack:valorTotal--}}
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-6 col-sm-12">
        <div class="tab-2 m-b-30">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active show" href="#dados" data-toggle="tab" aria-expanded="false">Dados da Comissão</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#fornecedor-2" data-toggle="tab" aria-expanded="false">Fornecedor</a>
                </li>
                @if(isset($comissao))

                    <li class="nav-item">
                        <a class="nav-link" href="#saidas-2" data-toggle="tab" aria-expanded="false">Pagamentos</a>
                    </li>

                @endif

            </ul>
            <div class="tab-content bg-white">
                <div class="tab-pane p-4 active show" id="dados">


                    <div class="row">
                        <div class="col-lg-12">
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="fornecedor">Fornecedor</label>
                                        <input class="form-control" type="text" id="fornecedor" value="" name="taxa" >
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="forma">Valor Liquido</label>
                                        <input type="text" class="form-control dinheiro" name="valor-liquido" value="" id="valor-liquido" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="forma">Valor Com Taxa</label>
                                        <input type="text" class="form-control dinheiro" name="valor-taxa" value="" id="valor-com-taxa" >
                                    </div>

                                </div>



                                <div class="form-row">

                                </div>
                                <div class="form-row">


                                </div>
                                @if(isset($comissao))
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                @else
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                @endif
                                <a href="{{route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$historico->id,'pagina'=>'comissao'])}}" class="btn btn-secondary">Voltar</a>

                                <a class="btn btn-primary pull-right btn-fornecedor" style="color: #fffefa">Novo Fornecedor</a>

                            </form>
                        </div>
                    </div>


                </div>
                <div class="tab-pane p-4" id="fornecedor-2">
                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            @include('admin.fornecedores.includes.form',['modal'=>0])

                        </div>
                    </div>
                </div>
                <div class="tab-pane p-4" id="saidas-2">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                </div>

            </div>
        </div>
    </div>

</div>




@stop
