@extends('front.layout001')
@section('conteudo')



        <!-- Page Title -->
        <div class="page-title">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Contato</h1>

            </div>
        </div><!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                <div class="mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.356960374241!2d-38.52100232431288!3d-3.7321400962417766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c748571068bfb1%3A0x5d0410b7f647d057!2sR.%20Pinto%20Madeira%2C%20750%20-%20Aldeota%2C%20Fortaleza%20-%20CE%2C%2060150-000!5e0!3m2!1spt-BR!2sbr!4v1751588302198!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Endereço</h3>
                                <p>{{$endereco}} - {{$bairro}} - {{$cidade}} - CEP: {{$cep}} </p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Whatsapp</h3>
                                <p><a target="_new" href="https://wa.me/55{{$telefone}}">{{$telefone}}</a></p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email</h3>
                                <p>{{$email}}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8 form-contato">
                        @if(session()->has('alerta'))
                            <div class="alert alert-{{session()->get('alerta')['tipo']}}">
                                <h4>{{session()->get('alerta')['texto_primario']}}</h4>
                                <h5>{{session()->get('alerta')['texto_secundario']}}</h5>

                            </div>
                        @else

                        <form action="{{route('site.cadastrar.contato')}}" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">
                                {{csrf_field()}}

                                    <div class="col-md-4">
                                        <input type="text" name="nome" class="form-control" placeholder="Seu Nome" value="rafael">
                                        @error('nome')
                                        <p style="color: red; margin: 0; padding: 0; font-size: 12px">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 ">
                                        <input type="email" class="form-control" name="email" placeholder="Seu Email" value="raffaelnlima@gmail.com">
                                        @error('email')
                                        <p style="color: red; margin: 0; padding: 0; font-size: 12px">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 ">
                                        <input type="text" class="form-control phone" name="whatsapp" placeholder="Seu Whatsapp" value="(85) 9870-67785">
                                        @error('whatsapp')
                                        <p style="color: red; margin: 0; padding: 0; font-size: 12px">{{$message}}</p>
                                        @enderror
                                    </div>



                                <div class="col-md-12">
                                    <textarea class="form-control" name="texto" rows="6" placeholder="Texto">awd</textarea>
                                    @error('texto')
                                    <p style="color: red; margin: 0; padding: 0; font-size: 12px">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Enviar</button>
                                </div>

                            </div>
                        </form>
                        @endif
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->


@endsection
