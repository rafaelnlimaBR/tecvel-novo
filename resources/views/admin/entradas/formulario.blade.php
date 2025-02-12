

{{-- VARIAVEIS PASSADAS POR PARAMETRO AO CHAMAR ESSE FORMULARIO    routeAaction:routeUpdate:routeBack:valorTotal--}}
    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>

    <div class="row">
        <div class="col-lg-5 col-sm-5 col-md-5">
            <div class="card ">
                <div class="card-body">
                    <form action="{{ isset($entrada)?$routeUpdate :$routeAction}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$id}}">
                        @if(isset($entrada))
                            <input hidden type="text" class="form-control" id="id-entrada" placeholder="" name="id" value="{{$entrada->id}}">
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="tipo">Tipo Pagamento</label>
                                <select class="form-control" name="tipo" id="tipos_pagamentos">
                                    @foreach($tipos as $tipo)
                                        @if(isset($entrada))
                                            @if($entrada->forma->tipo->id == $tipo->id)
                                                <option value="{{$tipo->id}}" selected>{{$tipo->nome}}</option>
                                            @else
                                                <option value="{{$tipo->id}}" >{{$tipo->nome}}</option>
                                            @endif
                                        @else
                                            @if($tipo_pagamento_preferido = $tipo->id)
                                                <option value="{{$tipo->id}}" selected>{{$tipo->nome}}</option>
                                            @else
                                                <option value="{{$tipo->id}}" >{{$tipo->nome}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="forma">Forma de Pagamento</label>
                                <select class="form-control" name="forma" id="forma-pagamentos">


                                    @if(isset($entrada))
                                        @foreach($formas as $forma)
                                            @if($entrada->forma->id == $forma->id)
                                                <option value="{{$forma->id}}" selected>{{$forma->nome}}</option>
                                            @else
                                                <option value="{{$forma->id}}" >{{$forma->nome}}</option>
                                            @endif
                                        @endforeach

                                    @else
                                        @foreach($formas    as $forma)
                                            @if($forma->id  ==  $forma_pagamento_preferida)
                                                <option value="{{$forma->id}}" selected>{{$forma->nome}}</option>
                                            @else
                                                <option value="{{$forma->id}}" >{{$forma->nome}}</option>
                                            @endif

                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="forma">Repasse</label>
                                <input type="checkbox" class="form-control" name="repassar" id="repassar" {{(isset($entrada)?$entrada->repassar_taxa==true?'checked':'':'checked')}} >
                            </div>


                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <label for="taxa">Taxa</label>
                                <input class="form-control" type="text" id="taxa" value="{{isset($entrada)?$entrada->taxa:"0.00"}}" name="taxa" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="forma">Valor</label>
                                <input type="text" class="form-control dinheiro" name="valor" value="{{isset($entrada)?$entrada->valor:$valor}}" id="valor">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="forma">Valor Liquido</label>
                                <input type="text" class="form-control dinheiro" name="valor-liquido" value="{{isset($entrada)?$entrada->valor_liquido:''}}" id="valor-liquido" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="forma">Valor Com Taxa</label>
                                <input type="text" class="form-control dinheiro" name="valor-taxa" value="{{isset($entrada)?$entrada->valor_acrescimo:''}}" id="valor-com-taxa" readonly>
                            </div>

                        </div>
                        <div class="form-row">

                        </div>
                        <div class="form-row">


                        </div>
                        @if(isset($entrada))
                            <button type="submit" class="btn btn-warning">Editar</button>
                        @else
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        @endif
                        <a href="{{$routeBack}}" class="btn btn-secondary">Voltar</a>


                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-5">
            <table>
                <tr>
                    <td><h3>Forma do Pagamento :</h3></td>
                    <td ><h4 style="color: #eb2027; margin-left: 10px" id="resultado-forma" class="resultado-pagamento"></h4></td>
                </tr>
                <tr>
                    <td><h3>Valor : </h3></td>
                    <td><h4 style="color: #eb2027; margin-left: 10px"   id="resultado-valor" class="resultado-pagamento"></h4></td>
                </tr>
                <tr>
                    <td><h3>Valor Com Taxa :</h3></td>
                    <td ><h4 style="color: #eb2027; margin-left: 10px"  id="resultado-valor-taxa" class="resultado-pagamento"></h4></td>
                </tr>
            </table>


        </div>

    </div>

