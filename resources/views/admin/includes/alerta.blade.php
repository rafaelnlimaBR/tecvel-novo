

@if(session()->has('alerta'))

<div style="margin-top: 10px" class="alert alert-{{Session::get('alerta')['tipo']}} alert-dismissible fade show" role="alert">
    {{Session::get('alerta')['texto']}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
