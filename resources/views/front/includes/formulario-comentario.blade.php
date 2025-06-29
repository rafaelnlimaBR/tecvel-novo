@if(isset($success))
    <h4 style="color: #048806">COMENTÁRIO ENVIADO COM SUCESSO! </h4>
@else

<form name="formulario-comentario" id="formulario-comentario">

    <h4>Deixe seu comentario</h4>

    <div class="row">
        <div class="col-md-6 form-group">
            <input name="nome" type="text" class="form-control {{$errors->has('nome')?'parsley-error':''}}" placeholder="Seu Nome*" value="{{isset($nome)?$nome:''}}">
            @error('nome')
            <p style="color: red">{{$message}}</p>
            @enderror
            <input hidden="" name="id_post" value="{{$postagem->id}}">
            {{csrf_field()}}
        </div>
        <div class="col-md-6 form-group">
            <input name="email" type="text" class="form-control {{$errors->has('email')?'input-error':''}}"   placeholder="Seu Email*" value="{{isset($email)?$email:''}}">
            @error('email')
            <p style="color: red">{{$message}}</p>
            @enderror

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 form-group">
            <input name="whatsapp" type="text" class="form-control phone {{$errors->has('whatsapp')?'input-error':''}}"   placeholder="Seu Whatsapp*" value="{{isset($whatsapp)?$whatsapp:''}}">
            @error('whatsapp')
            <p style="color: red">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col form-group">
            <textarea name="comentario" class="form-control {{$errors->has('comentario')?'parsley-error':''}}" placeholder="Seu Comentário*">{{isset($comentario)?$comentario:''}}</textarea>
            @error('comentario')
            <p style="color: red">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </div>

</form>
@endif
