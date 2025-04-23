<html>
<header>
    <title>Tecvel - Orçamento</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="{{ URL::asset('/plugins/upload-image/image-uploader.css') }}" rel="stylesheet" type="text/css">

    <style>
        body{
            margin-top:40px;
        }

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>
</header>
<body>
<div class="container">
    @if(session()->has('alerta'))
    <div class="alertas">
        <div class="alert alert-primary" role="alert">
            A simple primary alert—check it out!
        </div>
    </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Seus Dados</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Dados do Veículo</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Detalhes</p>
            </div>

        </div>
    </div>
    <form  method="post" class="orcamento" action="{{route('site.cadastrar.orcamento')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Seus Dados</h3>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label class="control-label">Nome Completo *</label>
                            <input  maxlength="100" type="text" class="form-control" required="required" placeholder="Seu Nome" name="nome" />
                        </div>
                        <div class="form-group col-md-5">
                            <label class="control-label">CPF/CNPJ *</label>
                            <input  maxlength="100" type="text" class="form-control cpfCnpj" required="required" placeholder="CPF ou CNPJ" name="cpfcnpj" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label class="control-label">Email *</label>
                            <input maxlength="100"  type="email" class="form-control" required="required" placeholder="Seu Email" name="email" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Whatsapp * Ex: 85987067785</label>
                            <input maxlength="100"  type="text" class="form-control telefone" required="required" placeholder="Seu Número Com Whatsapp" value="{{request()->get('whatsapp')?request()->get('whatsapp'):''}}" name="telefone"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="control-label">Cep</label>
                            <input maxlength="200" type="text"  class="form-control" placeholder="Cep" name="cep" id="cep" />
                        </div>

                        <div class="form-group col-md-7">
                            <label class="control-label">Endereço</label>
                            <input maxlength="200" type="text"  class="form-control" placeholder="Endereço" name="endereco" id="rua"/>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Número</label>
                            <input maxlength="200" type="text"  class="form-control" placeholder="Número" name="numero" id="numero" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="control-label">Bairro</label>
                            <input maxlength="100" type="text"  class="form-control" placeholder="Bairro" name="bairro" id="bairro"/>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="control-label">Cidade</label>
                            <input maxlength="100" type="text"  class="form-control" placeholder="Cidade" name="cidade" id="cidade"/>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Estado</label>
                            <input maxlength="100" type="text"  class="form-control" placeholder="Estado" name="estado" id="uf" />
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Próximo</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Dados do Veículo</h3>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="control-label">Placa</label>
                            <input maxlength="200" type="text" class="form-control placa" required="required" placeholder="Placa do Veículo" name="placa" />
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Montadora</label>
                            <select class="form-control" id="montadora-veiculos"  name="montadora">
                                @foreach($montadoras as $montadora)
                                    <option value="{{$montadora->id}}">{{$montadora->nome}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Modelo</label>
                            <select class="form-control" id="modelos-veiculos" required="required"  name="modelo">

                            </select>

                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Cor</label>
                            <input list="cor" class="form-control" name="cor"  required="required" />
                            <datalist id="cor" >
                                @foreach($cores as $c)

                                    <option  value="{{$c['nome']}}"></option>

                                @endforeach

                            </datalist>

                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Ano do Modelo</label>
                            <input maxlength="200" type="text"  class="form-control numero" required="required" name="ano" placeholder="Ano do Modelo" />
                        </div>
                    </div>

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Próximo</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Detalhes do Pedido de Orçamento</h3>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Descrição do Pedido de Orçamento *</label>
                            <textarea class="form-control" rows="9" required="required" name="descricao"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Imagens</label>
                            <div class="input-images"></div>
                        </div>

                    </div>

                </div>
            </div>

            <button class="btn btn-success btn-lg pull-right" type="submit">Enviar Pedido de Orçamento</button>
        </div>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
{{--<script type="text/javascript"  src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>--}}
<script type="text/javascript"  src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript"  src="{{ URL::asset('/plugins/upload-image/dist/image-uploader.min.js') }}" rel="stylesheet" type="text/css"></script>
<script>
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='email'],textarea"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');

        atualizarModelos($('#montadora-veiculos').val())

        $('.orcamento').on('change','#montadora-veiculos',function () {
            atualizarModelos($(this).val())
        })

        function atualizarModelos (idMontadora){
            var id  =   idMontadora;
            $('#modelos-veiculos').val('');
            var rota    =   "{{route('montadora.modelos',['id'=>':id'])}}";
            rota        =   rota.replace(':id',id);
            var lista   =   "";

            $.ajax({
                type: "GET",
                url: rota,
                success: function( data )
                {
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

        $('.cpfcnpj').mask('000.000.000-00', {
            onKeyPress : function(cpfcnpj, e, field, options) {
                const masks = ['000.000.000-000', '00.000.000/0000-00'];
                const mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
                $('.cpfcnpj').mask(mask, options);
            }
        });
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

                        if (!("erro" in dados)) {
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
</body>
</html>


