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
                    <a class="nav-link {{request()->exists('pagina')?request()->get('pagina') == "dados"?'active':'':'active'}}" href="#dados" data-toggle="tab" aria-expanded="false">Dados da Comissão</a>
                </li>
               {{-- <li class="nav-item">
                    <a class="nav-link" href="#fornecedor-2" data-toggle="tab" aria-expanded="false">Fornecedor</a>
                </li>--}}
                @if(isset($comissao))

                    <li class="nav-item">
                        <a class="nav-link {{request()->exists('pagina')?request()->get('pagina') == "pagamentos"?'active':'':''}}" href="#saidas-2" data-toggle="tab" aria-expanded="false">Pagamentos</a>
                    </li>

                @endif

            </ul>
            <div class="tab-content bg-white">
                <div class="tab-pane p-4 {{request()->exists('pagina')?request()->get('pagina') == "dados"?'active':'':'active'}}" id="dados">


                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{isset($comissao)?route('atualizar.comissao'):route('cadastrar.comissao')}}" method="POST">
                                <input hidden="" value="{{$historico->id}}" name="historico">
                                <input hidden value="{{$historico->contrato->id}}" name="contrato">
                                @if(isset($comissao))
                                    <input hidden="" name="comissao_id" value="{{$comissao->id}}">
                                @endif
                                {{ csrf_field() }}
                                <div class="form-row">

                                    <div class="form-group col-md-9">
                                        <label for="fornecedor "><a href="{{route('fornecedor.novo')}}" target="new" style="color: #0a53be" class="">Fornecedor <i class="fa fa-plus-square" aria-hidden="true"></i></a></label>
                                        <select type="text"  class="form-control select2 @error('fornecedor')is-invalid @enderror" ui-select2="{width:'resolve',dropdownAutoWidth:true}" style="width:100%" id="pesquisa-fornecedor" name="fornecedor" >
                                            @if(isset($comissao))
                                                <option value="{{$comissao->fornecedor->id}}">{{$comissao->fornecedor->nome}}</option>
                                            @endif
                                        </select>
                                        @error('fornecedor')
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="forma">Valor</label>
                                        <input type="text" class="form-control dinheiro @error('valor')is-invalid @enderror" name="valor" value="{{isset($comissao)?$comissao->valor:'0'}}" >
                                        @error('valor')
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="obs">Obs</label>
                                        <textarea  class="form-control " name="obs" >{{isset($comissao)?$comissao->obs:''}}</textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="data">Data</label>
                                        <input  class="form-control date-time @error('data')is-invalid @enderror" name="data" value="{{isset($comissao)?\Carbon\Carbon::parse($comissao->data)->format('d/m/Y'):\Carbon\Carbon::now()->format('d/m/Y')}}"   autocomplete="off">
                                        @error('data')
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                @if(isset($comissao))
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                @else
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                @endif
                                <a href="{{route('contrato.editar',['id'=>$contrato->id,'historico_id'=>$historico->id,'pagina'=>'comissao'])}}" class="btn btn-secondary">Voltar</a>

                                <a class="pull-right btn btn-primary" href="{{route('fornecedor.novo',['route_back'=>route('contrato.nova.comissao',['id'=>$contrato->id,'historico_id'=>$historico->id])])}}">Novo Fornecedor</a>


                            </form>
                        </div>
                    </div>


                </div>
                {{--<div class="tab-pane p-4" id="fornecedor-2">
                    <div class="row">

                        <div class="col-md-12 col-sm-12">


                        </div>
                    </div>
                </div>--}}
                @if(isset($comissao))
                <div class="tab-pane p-4 {{request()->exists('pagina')?request()->get('pagina') == "pagamentos"?'active':'':''}}" id="saidas-2">

                    <div class="row">

                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="{{route('contrato.editar.comissao.novo.pagamento',['id'=>$contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id])}}" style="margin-bottom: 10px; color: #efefef">Novo Pagamento</a>
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <td>Valor</td>
                                        <td     >Data</td>
                                        <td style="width: 20%">Ações</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($comissao->saidas as $saida)
                                    <tr>
                                        <td>{{$saida->valor}}</td>
                                        <td>{{\Carbon\Carbon::parse($saida->data)->format('d/m/Y')}}</td>
                                        <td><a href="{{route('comissao.excluir.pagamento',['id'=>$contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id,'saida_id'=>$saida->id])}}" onclick="return confirm('Deseja excluir esse registro?')" class="btn btn-danger btn-sm"  ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            <a href="{{route('contrato.editar.comissao.editar.pagamento',['id'=>$contrato->id,'historico_id'=>$historico->id,'comissao_id'=>$comissao->id,'saida_id'=>$saida->id])}}" class="btn btn-warning btn-sm"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
                @endif
            </div>
        </div>
    </div>

</div>


<div class="row">



</div>

@stop
