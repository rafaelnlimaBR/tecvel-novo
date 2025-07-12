<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="content-language" content="pt-br">
    <title>Tecvel - Orçamento</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->

    <link href="{{ URL::asset('/wizard/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/wizard/css/gsdk-bootstrap-wizard.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('/plugins/upload-image/image-uploader.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ URL::asset('/wizard/css/demo.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
{{--<div class="image-container set-full-height" style="background-image: url('images/wizard/wizard-city.jpg')">--}}
<div class="image-container set-full-height" style="background-color: #bebebe">
    <!--   Creative Tim Branding   -->




    <!--   Big container   -->
    <div class="container">
        @if(session()->has('alerta'))
            <h1 class="" style="color: #2e8d2a; text-align: center">{{Session::get('alerta')['texto_principal']}}</h1>
            <h5 style="color: #0a2c0a; text-align: center">{{Session::get('alerta')['texto_segundario']}}</h5>
        @endif

         <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" {{session()->has('formulario_off')?'hidden':''}}>

                        <!--      Wizard container        -->
                        <div class="wizard-container orcamento">

                            <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                <form action="{{route('site.cadastrar.orcamento')}}" enctype="multipart/form-data" method="post">
                                    <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                    <div class="wizard-header">
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <div class="text-center">
                                                    <img class="rounded" src="{{URL::asset('/images/logo.png')}}" style="">

                                                </div>

                                            </div>
                                            <div class="col-md-8">
                                                <h3>
                                                    <b>PEDIDO DE ORÇAMENTO</b> <br>
                                                    <small>Preencha as informações, em breve receberá o orçamento</small>
                                                </h3>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#about" data-toggle="tab">Seus Dados</a></li>
                                            <li><a href="#account" data-toggle="tab">Veículo</a></li>
                                            <li><a href="#address" data-toggle="tab">Detalhes</a></li>
                                        </ul>

                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane" id="about">
                                            <h4 class="info-text"> Seus Dados</h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">Nome Completo (Obrigatório)</label>
                                                    <input  maxlength="100" type="text" class="form-control" required="required" placeholder="Seu Nome" name="nome" />
                                                    {{csrf_field()}}
                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label class="control-label">Email (Obrigatório)</label>
                                                    <input maxlength="100"  type="email" class="form-control" required="required" placeholder="Seu Email" name="email" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Whatsapp (Obrigatório)</label>
                                                    <input maxlength="100"  type="text" class="form-control telefone" required="required" placeholder="Ex: 85987067785" value="{{request()->get('whatsapp')?request()->get('whatsapp'):''}}" name="telefone"/>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Cep</label>
                                                    <input maxlength="200" type="text"  class="form-control" placeholder="Cep" name="cep" id="cep" />
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Endereço</label>
                                                    <input maxlength="200" type="text"  class="form-control" placeholder="Endereço" name="endereco" id="rua"/>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Número</label>
                                                    <input maxlength="200" type="text"  class="form-control" placeholder="Número" name="numero" id="numero" />
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Bairro</label>
                                                    <input maxlength="100" type="text"  class="form-control" placeholder="Bairro" name="bairro" id="bairro"/>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label">Cidade</label>
                                                    <input maxlength="100" type="text"  class="form-control" placeholder="Cidade" name="cidade" id="cidade"/>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Estado</label>
                                                    <input maxlength="100" type="text"  class="form-control" placeholder="Estado" name="estado" id="uf" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="account">
                                            <h4 class="info-text"> Dados do Veículo </h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Placa</label>
                                                    <input maxlength="200" type="text" class="form-control placa" required="required" placeholder="Placa do Veículo" name="placa" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Montadora</label>
                                                    <select class="form-control" id="montadora-veiculos"  name="montadora">
                                                        @foreach($montadoras as $montadora)
                                                            <option value="{{$montadora->id}}">{{$montadora->nome}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Modelo</label>
                                                    <select class="form-control" id="modelos-veiculos" required="required"  name="modelo">

                                                    </select>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Cor</label>
                                                    <input list="cor" class="form-control" name="cor"  required="required" />
                                                    <datalist id="cor" >
                                                        @foreach($cores as $c)

                                                            <option  value="{{$c['nome']}}"></option>

                                                        @endforeach

                                                    </datalist>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Ano do Modelo</label>
                                                    <input maxlength="200" type="text"  class="form-control numero" required="required" name="ano" placeholder="Ex: 2015" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="address">
                                            <h4 class="info-text"> Detalhes </h4>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">Descrição do Pedido de Orçamento *</label>
                                                    <textarea class="form-control" rows="9" required="required" name="descricao"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">Imagens</label>
                                                    <div class="form-control input-images"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer height-wizard">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Próximo' />
                                            <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Enviar' />

                                        </div>

                                        <div class="pull-left">
                                            <input type='button'  class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Anterior' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </form>
                            </div>
                        </div> <!-- wizard container -->
                    </div>
                </div><!-- end row -->


    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
            <a style="background-color: #28272a; color: #e0dbeb" class="btn btn-primary btn-lg" href="{{route('site.home')}}">Voltar para o site principal</a>
        </div>
    </div>

</div>

</body>

<!--   Core JS Files   -->

<script type="text/javascript"  src="{{ URL::asset('/js/jquery-3.2.1.min.js') }}" rel="stylesheet" type="text/css"></script>

<script type="text/javascript"  src="{{ URL::asset('/wizard/js/bootstrap.min.js') }}" rel="stylesheet" type="text/css"></script>
<script type="text/javascript"  src="{{ URL::asset('/wizard/js/jquery.bootstrap.wizard.js') }}" rel="stylesheet" type="text/css"></script>
<script type="text/javascript"  src="{{ URL::asset('/wizard/js/gsdk-bootstrap-wizard.js') }}" rel="stylesheet" type="text/css"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript"  src="{{ URL::asset('/plugins/upload-image/dist/image-uploader.min.js') }}" rel="stylesheet" type="text/css"></script>


<!--  Plugin for the Wizard -->


<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script type="text/javascript"  src="{{ URL::asset('/js/jquery.validate.min.js') }}" rel="stylesheet" type="text/css"></script>

<script>
    $(document).ready(function () {


        atualizarModelos($('#montadora-veiculos').val())

        $('.orcamento').on('change','#montadora-veiculos',function () {
            atualizarModelos($(this).val())
        })

        function atualizarModelos (idMontadora){
            var id  =   idMontadora;
            $('#modelos-veiculos').val('');
            var rota    =   "{{route('site.modelos.montadora',['id'=>':id'])}}";
            rota        =   rota.replace(':id',id);
            var lista   =   "";

            $.ajax({
                type: "GET",
                url: rota,
                success: function( data )
                {
                    console.log(data);
                    $('#modelos-veiculos').empty();
                    for(var i=0; i<data.length;i++){
                        $("#modelos-veiculos").append("<option value='" +
                            data[i].id + "'>"+data[i].nome+"</option>");
                    }
                },
                error:function (data,e) {
                    alert(data);
                }
            });
        }


        $('.cep').mask('00000-000');
        $('.telefone').mask('(00)000000000')
        $('.placa').mask('AAA0U00', {
            translation: {
                'A': {
                    pattern: /[A-Za-z]/
                },
                'U': {
                    pattern: /[A-Za-z0-9]/
                },
            },
            onKeyPress: function (value, e, field, options) {
                // Convert to uppercase
                e.currentTarget.value = value.toUpperCase();

                // Get only valid characters
                let val = value.replace(/[^\w]/g, '');

                // Detect plate format
                let isNumeric = !isNaN(parseFloat(val[4])) && isFinite(val[4]);
                let mask = 'AAA0U00';
                if(val.length > 4 && isNumeric) {
                    mask = 'AAA0000';
                }
                $(field).mask(mask, options);
            }
        });
        $('.numero').mask('0000');
        $('.input-images').imageUploader();

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        };
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("errors" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $('#numero').focus();
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>

</html>
