<h3>Novo Pedido de Orçamento Cadastrato</h3>
<br>
<h4>ID: {{$contrato->id}} Criado: {{\Carbon\Carbon::parse($contrato->created_at)->format('d/m/Y')}}</h4>
<b>Cliente:</b>{{$contrato->cliente->nome}}<br>
<br>
<br>
@foreach($contrato->historicos->map->notas->flatten() as $notas)
    <h4>{{$notas->tipo->nome}}</h4>
    <p>{{$notas->texto}}</p>
@endforeach
