@extends('front.layout001')
@section('conteudo')


    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">{{$titulo}}</h1>

        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                <div class="obs" style="margin: 20px">

                    <h4>Observações:</h4>
                    <ul>
                        <li>O orçamento depois que enviado terá uma validade de 3 dias.</li>
                        <li>Você receberá seu orçamento no seu número de Whatsapp e Email.</li>
                        <li>Em alguns casos será necessário levar o veículo ou a peça até nossa loja para que seja feita uma análise, antes de passar o orçamento.</li>
                        <li>Pagamentos no crédito será acrescido a taxa da máquina, consultar taxas. </li>
                        <li>Ao preencher esse formulário você autorizará que salvemos seus dados na nossa base de dados.</li>
                        <li>Seus dados estarão seguros com base na Lei Geral de Proteção de Dados Pessoais (LGPD) nº 13.709/2018</li>
                    </ul>
                </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('alerta'))
                        <div class="alert alert-{{Session::get('alerta')['tipo']}}">
                            {{Session::get('alerta')['texto_principal']}}
                        </div>
                    @endif

                <div class="col-lg-12">

                    <form action="{{route('site.cadastrar.orcamento')}}" enctype="multipart/form-data" method="post" class="php-email-form aos-init aos-animate orcamento" >
                        <div class="row gy-4">
                            <div class="row" style="padding-bottom: 20px">
                                {{csrf_field()}}
                                <div class="col-md-4">
                                    <label for="nome">Nome Completo: *</label>
                                    <input type="text" name="nome" class="form-control {{$errors->has('nome')?'input-error':''}}" placeholder="Seu nome completo" value="{{old('nome')}}">
                                    @error('nome')
                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>

                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Email: *</label>
                                    <input type="text" name="email" class="form-control" placeholder="Seu email" value="{{old('email')}}" >
                                    @error('email')
                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>
                                    @enderror
                                 </div>
                                <div class="col-md-4">
                                    <label for="whatsapp">Whatsapp: * (ex: (85) 987067785)</label>
                                    <input type="text" name="whatsapp" class="form-control phone" placeholder="Seu whatsapp com ddd" value="{{old('whatsapp',request()->get('whatsapp')?request()->get('whatsapp'):'')}}">
                                    @error('whatsapp')
                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>
                                    @enderror

                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 20px">
                                <div class="col-md-2">
                                    <label for="placa">Placa: *</label>
                                    <input type="text" name="placa" class="form-control placa" placeholder="Placa do veiculo" value="{{old('placa')}}">
                                    @error('placa')
                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="marca">Marca: *</label>
                                    <select class="form-control" id="montadora-veiculos"  name="marca">
                                        @foreach($montadoras as $montadora)
                                            @if($montadora->id == old('marca'))
                                                <option selected value="{{$montadora->id}}">{{$montadora->nome}}</option>
                                            @else
                                                <option value="{{$montadora->id}}">{{$montadora->nome}}</option>
                                            @endif

                                        @endforeach
                                    </select>

                                    @error('marca')
                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="modelo">Modelo: *</label>
                                    <select class="form-control" id="modelos-veiculos" name="modelo">

                                    </select>
                                    @error('modelo')
                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="ano">Ano: * (ex: 2022)</label>
                                    <input type="text" name="ano" class="form-control numero" placeholder="Ano do veiculo" value="{{old('ano')}}">
                                    @error('ano')
                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>

                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="cor">Cor: *</label>
                                    <input list="cor" class="form-control" name="cor"  value="{{old('cor')}}" />
                                    <datalist id="cor" >
                                        @foreach($cores as $c)

                                            <option  value="{{$c['nome']}}"></option>

                                        @endforeach

                                    </datalist>
                                    @error('cor')

                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>
                                    @enderror
                                </div>



                            </div>


                            <div class="row" style="padding-bottom: 20px">
                                <div class="col-md-12">
                                    <label for="descricao">Descreva com poucas palavras o defeito do seu veículo.</label>
                                    <textarea class="form-control" name="descricao" rows="7">{{old('descricao')}}</textarea>
                                    @error('descricao')
                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 20px">
                                <div class="col-md-12">
                                    <label class="control-label">Envie algumas imagens do defeito para facilitar a análise.</label>
                                    <div class="input-images"></div>
                                    @error('imagens')

                                    <ul class="parsley-errors-list filled"><li class="" style="font-size: 11px; color: red; ">{{$message}}</li></ul>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <button type="submit"   class="form-control btn-lg btn-success btn" style="font-style: normal; font-family: Arial; color: #ffffff; background-color: #258d29">ENVIAR PEDIDO DE ORÇAMENTO</button>
                            </div>

                        </div>
                    </form>


                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

    <script type="text/javascript">
        $(document).ready(function(){

            atualizarModelos($('#montadora-veiculos').val())

            $('.numero').mask('0000');

            $('.input-images').imageUploader();


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
                            var html = "";
                            var old     =   "{{old('modelo')}}";

                            console.log(old)
                            if(data[i].id == old) {
                                html    =   "<option selected value='"+data[i].id+"'> "+data[i].nome+" </option>";
                            }else {
                                html =  "<option value='"+data[i].id+"'> "+data[i].nome+" </option>"
                            }

                            $("#modelos-veiculos").append(html);
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });
            }

            $('.orcamento').on('change','#montadora-veiculos',function () {
                atualizarModelos($(this).val())
            })


        });

    </script>

@endsection
