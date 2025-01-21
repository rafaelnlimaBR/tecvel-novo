@extends('admin.index')

@section('conteudo')
<div class="page-head">
    <h4 class="my-2">{{$titulo}}</h4>
</div>

<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12">
        <div class="card-title tab-2">
            <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                    <a class="nav-link {{isset($pagina)?$pagina == "dados"?'active':'':''}}" href="#dados" data-toggle="tab" aria-expanded="false"><i class="ti-user mr-2"></i>Dados</a>
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
                <div class="tab-pane {{isset($pagina)?$pagina == "dados"?'active':'':''}} p-4" id="dados">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <form action="{{ isset($contrato)? route('contrato.atualizar'):route('contrato.cadastrar') }}" method="POST">
                                {{ csrf_field() }}
                                @if(isset($contrato))
                                    <input hidden type="text" class="form-control" id="id-contrato" placeholder="" name="id" value="{{$contrato->id}}">
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="cliente" id="">Cliente <span id="cadastrar-cliente"><a style="color: #ffffff" data-toggle="modal" data-target="#formularioClienteModal" class="btn btn-sm btn-primary" id="botao-cliente-modal" >Novo</a></span><span id="editar-cliente"></span> </label>
                                        <select type="text" required class="form-control select2" ui-select2="{width:'resolve',dropdownAutoWidth:true}" style="width:100%" id="pesquisa-cliente" name="cliente" >

                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="veiculo">Veiculo <span style=""><span id="cadastrar-veiculo"><a style="color: #ffffff" data-toggle="modal" data-target="#formularioVeiculoModal"  class="btn btn-sm btn-primary" >Novo</a></span><span id="editar-veiculo"></span> </span></label>
                                        <select type="text" class="form-control select2" ui-select2="{width:'resolve',dropdownAutoWidth:true}" style="width:100%"   id="pesquisa-veiculo"  name="veiculo" >

                                        </select>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="defeito">Defeito </label>
                                        <textarea style="min-height: 150px" class="form-control " name="defeito"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="solucao">Solução </label>
                                        <textarea style="min-height: 150px" class="form-control " name="solucao"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="obs">Observação </label>
                                        <textarea style="min-height: 150px" class="form-control " name="obs"></textarea>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="garantia">Garantia </label>
                                        <input class="form-control date-time" required name="garantia" value="{{isset($contrato)?$contrato->garantia:\Carbon\Carbon::now()->addDay(90)->format('d/m/Y')}}">
                                    </div>


                                </div>
                                @if(isset($contrato))
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                @else
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                @endif
                                <a href="{{route('contrato.index')}}" class="btn btn-secondary">Voltar</a>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane {{isset($pagina)?$pagina == "historico"?'active':'':''}}" id="historico">
                    <p class="py-3 text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                    <div class="row container-grid nf-col-3 projects-wrapper">
                        <div class="col-lg-4 col-md-6 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post1.jpg" title="30 min ago">
                                    <img class="item-container " src="assets/images/post/post1.jpg" alt="7">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post2.jpg" title="yesterday">
                                    <img class="item-container mfp-fade" src="assets/images/post/post2.jpg" alt="2">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post3.jpg" title="3 day ago">
                                    <img class="item-container" src="assets/images/post/post3.jpg" alt="4">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 m-0 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post4.jpg" title="last week">
                                    <img class="item-container" src="assets/images/post/post4.jpg" alt="5">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post5.jpg" title="last month">
                                    <img class="item-container" src="assets/images/post/post5.jpg" alt="6">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post6.jpg" title="last year">
                                    <img class="item-container" src="assets/images/post/post6.jpg" alt="1">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post1.jpg" title="30 min ago">
                                    <img class="item-container " src="assets/images/post/post1.jpg" alt="7">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post2.jpg" title="yesterday">
                                    <img class="item-container mfp-fade" src="assets/images/post/post2.jpg" alt="2">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 p-0 nf-item">
                            <div class="item-box">
                                <a class="cbox-gallary1 mfp-image" href="assets/images/post/post3.jpg" title="3 day ago">
                                    <img class="item-container" src="assets/images/post/post3.jpg" alt="4">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3"> <a href="#" class="primary">View all 10+ post</a></div>
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
    </div>


</div>


@include('admin.clientes.formulario-modal')
@include('admin.veiculos.formulario-modal',['modal'=>1])
@stop
