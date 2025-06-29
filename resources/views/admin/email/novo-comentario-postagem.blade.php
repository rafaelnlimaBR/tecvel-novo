<h4>Novo comentario registrado - {{\Carbon\Carbon::parse($comentario->created_at)->format('d-m-Y H-i-s')}}</h4>
<br>
<h5>Cliente: {{$comentario->cliente->nome}}</h5>


<p>{!! $comentario->descricao !!}</p>
