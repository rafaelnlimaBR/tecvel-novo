
    {{ csrf_field() }}
    @if(isset($veiculo))
        <input hidden type="text" class="form-control" id="id-veiculo" placeholder="" name="id" value="{{$veiculo->id}}">
    @endif
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="placa">Placa</label>
            <input type="text" required class="form-control placa"  placeholder="Placa" name="placa" value="{{isset($veiculo)?$veiculo->placa:''}}">
            @if(isset($modal))
                <input type="hidden"   name="modal" value="{{$modal}}">
            @endif

        </div>
        <div class="form-group col-md-5">
            <label for="ano">Ano</label>
            <input type="text" required class="form-control"  placeholder="Ano" name="ano" value="{{isset($veiculo)?$veiculo->ano:''}}">
        </div>
        <div class="form-group col-md-3">
            <label for="cor">Cor</label>
            <input list="cor" class="form-control" name="cor" required value="{{isset($veiculo)?$veiculo->cor:""}}" />
            <datalist id="cor" >
                @foreach($cores as $c)

                    <option  value="{{$c['nome']}}"></option>

                @endforeach

            </datalist>
        </div>


    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="marca">Montadora</label>
            <select name="montadora" id="montadora-veiculos" class="form-control">
                @foreach($montadoras as $m)
                    @if(isset($veiculo))
                        @if($m->id == $veiculo->modelo->montadora->id)
                            <option selected value="{{$m->id}}">{{$m->nome}}</option>
                        @else
                            <option value="{{$m->id}}">{{$m->nome}}</option>
                        @endif
                    @else
                        <option value="{{$m->id}}">{{$m->nome}}</option>
                    @endif


                @endforeach

            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="modelos" >Modelos</label>
            <input list="modelos" class="form-control caixa-alta" id="modelos-veiculos" name="modelo" value="{{isset($veiculo)?$veiculo->modelo->nome:""}}">

            <datalist id="modelos">

            </datalist>



        </div>
    </div>




