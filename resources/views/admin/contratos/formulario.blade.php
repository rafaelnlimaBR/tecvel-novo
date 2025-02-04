@extends('admin.index')

@section('conteudo')
<div class="page-head">
    @if(isset($contrato))
        <h4 class="my-2">Status atual : {{$contrato->historicos->last()->status->nome}}<br>
        @if($contrato->historicos->last()->status->id != $historico->status->id)
            <span style="color: #e21920"> Voce está no status {{$historico->status->nome}}</span>

        @endif
        </h4>
    @else
        <h4 class="my-2">{{$titulo}}</h4>
    @endif
</div>

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="tab-2 m-b-30">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{request()->exists('pagina')?request()->get('pagina') == "dados"?'active':'':''}}" href="#home-2" data-toggle="tab" aria-expanded="false">Dados</a>
                </li>
                @if(isset($contrato))
                <li class="nav-item">
                    <a class="nav-link {{request()->exists('pagina')?request()->get('pagina') == "historicos"?'active':'':''}}" href="#historicos" data-toggle="tab" aria-expanded="false">Historicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{request()->exists('pagina')?request()->get('pagina') == "servicos"?'active':'':''}}" href="#servicos" data-toggle="tab" aria-expanded="false">Serviços</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link  {{request()->exists('pagina')?request()->get('pagina') == "pecas"?'active':'':''}}" href="#pecas" data-toggle="tab" aria-expanded="false">Peças</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-2" data-toggle="tab" aria-expanded="false">Contact</a>
                </li>

                @endif
            </ul>
            <div class="tab-content bg-white">
                <div class="tab-pane  p-4 {{request()->exists('pagina')?request()->get('pagina') == "dados"?'active':'':''}}" id="home-2">
                    @include('admin.contratos.includes.dados')
                </div>
                @if(isset($contrato))
                <div class="tab-pane p-4 {{request()->exists('pagina')?request()->get('pagina') == "historicos"?'active':'':''}}" id="historicos">
                    @include("admin.contratos.includes.historicos")
                </div>
                <div class="tab-pane p-4  {{request()->exists('pagina')?request()->get('pagina') == "servicos"?'active':'':''}}" id="servicos">
                    @include("admin.contratos.includes.servicos")
                </div>
                    <div class="tab-pane p-4  {{request()->exists('pagina')?request()->get('pagina') == "pecas"?'active':'':''}}" id="pecas">
                        @include("admin.contratos.includes.pecas")
                    </div>

                <div class="tab-pane p-4" id="contact-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="email" class="form-control" id="inputname4" placeholder="Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Phone</label>
                                    <input type="text" class="form-control" id="inputnom4" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Massege</label>
                                <input type="text-area" class="form-control" id="inputMassege" placeholder="Massege">
                            </div>
                            <div class="col-auto p-0">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
        @if(isset($contrato))
        <div class="row" >
            <div class="col-lg-12"  style="padding: 20px; background-color: #e2e2e2">
                        @foreach($contrato->historicos->last()->status->proximosStatus as $proximo)
                            <a  class="btn btn-sm botao-mudar-status" style="background-color: {{$proximo->cor_fundo}}; color: {{$proximo->cor_letra}}" status="{{$proximo->id}}">{{$proximo->nome}}</a>
                        @endforeach
            </div>
        </div>
        @endif
    </div>



</div>


@include('admin.clientes.formulario-modal')
@include('admin.veiculos.formulario-modal',['modal'=>1])
@if(isset($contrato))
@include("admin.contratos.includes.modal-mudar-status")
@endif
@stop
{{--
<div class="col-lg-12 col-sm-12 col-md-12">
    <div class="card-title tab-2">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link {{request()->exists('pagina')?request()->get('pagina') == "dados"?'active':'':''}}" href="#dados" data-toggle="tab" aria-expanded="false"><i class="ti-user mr-2"></i>Dados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{isset($pagina)?$pagina == "historico"?'active':'':''}}" href="#historico" data-toggle="tab" aria-expanded="false"><i class="ti-image mr-2"></i>Histórico</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#settings" data-toggle="tab" aria-expanded="false"><i class="ti-settings mr-2"></i>Settings</a>
            </li>
        </ul>
        <div class="tab-content p-4 bg-white">
            <div class="tab-pane home-text p-4" id="home-6">
                <img src="assets/images/logo_sm.png" alt="">
                <h1>Syntra Admin Template</h1>
                <h4 class="text-muted">Sociis natoque penatibus et magnis dis parturient montes.</h4>
            </div>
            <div class="tab-pane {{request()->exists('pagina')?request()->get('pagina') == "dados"?'active':'':''}} p-4" id="dados">
                @include('admin.contratos.includes.dados')
            </div>
            <div class="tab-pane {{isset($pagina)?$pagina == "historico"?'active':'':''}}" id="historico">
                @include("admin.contratos.includes.historicos")
            </div>
            <div class="tab-pane" id="settings">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" class="card-box mt-4">
                                                            <span class="input-icon icon-right">
                                                                <textarea rows="4" class="form-control" placeholder="Post a new message"></textarea>
                                                            </span>
                            <div class="pt-3 pull-right">
                                <a class="btn btn-sm btn-outline-secondary">Send</a>
                            </div>
                            <ul class="nav nav-pills profile-pills mt-2">

                                <li>
                                    <a href="#"><i class=" fa fa-video-camera mx-2"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-camera mx-2"></i></a>
                                </li>
                            </ul>
                        </form>

                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <input type="text" placeholder="Full Name" class="form-control form-control-line">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <input type="email" placeholder="Email" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" placeholder="password" class="form-control form-control-line">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" placeholder="Re-password" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Phone No" class="form-control form-control-line">
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea rows="5" placeholder="Message" class="form-control form-control-line"></textarea>
                                    <button class="btn btn-info">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>--}}
