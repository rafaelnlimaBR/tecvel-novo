
    {{ csrf_field() }}

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="placa">Placa</label>
            <input type="text"  class="form-control placa {{$errors->has('placa')?'parsley-error':''}}"  placeholder="Placa" name="placa" value="{{old('placa',isset($veiculo)?$veiculo->placa:'')}}">
            @error('placa')
            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
            @enderror
            @if(isset($modal))
                <input type="hidden"   name="modal" value="{{$modal}}">
            @endif

        </div>
        <div class="form-group col-md-5">
            <label for="ano">Ano</label>
            <input type="text"  class="form-control {{$errors->has('ano')?'parsley-error':''}}"  placeholder="Ano" name="ano" value="{{old('ano',isset($veiculo)?$veiculo->ano:'')}}">
            @error('ano')
            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="cor">Cor</label>
            <input list="cor" class="form-control {{$errors->has('cor')?'parsley-error':''}}" name="cor"  value="{{old('cor',isset($veiculo)?$veiculo->cor:"")}}" />
            <datalist id="cor" >
                @foreach($cores as $c)

                    <option  value="{{$c['nome']}}"></option>

                @endforeach

            </datalist>
            @error('cor')
            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
            @enderror
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
            <input list="modelos" class="form-control caixa-alta {{$errors->has('modelo')?'parsley-error':''}}" id="modelos-veiculos" name="modelo" value="{{isset($veiculo)?$veiculo->modelo->nome:""}}">

            <datalist id="modelos">

            </datalist>
            @error('modelo')
            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$message}}</li></ul>
            @enderror



        </div>
    </div>




