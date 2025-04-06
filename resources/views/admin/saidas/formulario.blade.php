
    <div class="page-head">
        <h4 class="my-2">{{$titulo}}</h4>
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-12 col-md-12">
            <div class="card ">
                <div class="card-body">
                    <form action="{{isset($saida)?$routeUpdate:$routeAction}}" method="POST">
                        {{ csrf_field() }}
                        @if(isset($saida))
                            <input hidden type="text" class="form-control" placeholder="" name="saida_id" value="{{$saida->id}}">
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="valor">Valor</label>
                                <input type="text" required class="form-control dinheiro" autocomplete="off"  placeholder="Valor" name="valor" value="{{isset($saida)?$saida->valor:0.00}}">
                                <input name="foreignkey" value="{{$foreignkey}}" hidden="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data">Data</label>
                                <input type="text" required class="form-control date-time" autocomplete="off"  placeholder="Data" name="data" value="{{isset($saida)?\Carbon\Carbon::parse($saida->data)->format('d/m/Y'):\Carbon\Carbon::now()->format('d/m/Y')}}">
                            </div>



                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="obs">Obs</label>
                                <textarea   class="form-control " autocomplete="off"   name="obs">{{isset($saida)?$saida->obs:''}}</textarea>
                            </div>
                        </div>

                        @if(isset($saida))
                            <button type="submit" class="btn btn-warning">Editar</button>
                        @else
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        @endif
                        <a href="{{$routeBack}}" class="btn btn-secondary">Voltar</a>


                    </form>

                </div>

            </div>
        </div>


    </div>


