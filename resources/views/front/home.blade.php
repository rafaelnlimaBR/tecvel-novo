@extends('front.layout001')
@section('conteudo')
    <!-- Slider Section -->
    <section id="slider" class="slider section dark-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">

                <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 600,
                      "autoplay": {
                        "delay": 5000
                      },
                      "slidesPerView": "auto",
                      "centeredSlides": true,
                      "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                      },
                      "navigation": {
                        "nextEl": ".swiper-button-next",
                        "prevEl": ".swiper-button-prev"
                      }
                    }
                </script>

                <div class="swiper-wrapper">
                    @foreach($banners    as $banner)
                        <div class="swiper-slide" style="background-image: url({{URL::asset('images/banners/'.$banner->imagem)}})">
                            <div class="content">
                                @if($banner->tem_link)
                                    <h2><a href="{{$banner->link}}">{{$banner->titulo}}</a></h2>
                                @else
                                    <h2>{{$banner->titulo}}</h2>
                                @endif

                                <p>{{$banner->texto}}</p>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Slider Section -->

    @foreach($categorias as $categoria)
        @if($categoria->postagens->count() > 0)

            <section id="{{str_replace(' ','-',$categoria->nome)}}-category" class="lifestyle-category section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <div class="section-title-container d-flex align-items-center justify-content-between">
                        <h2>{{$categoria->nome}}</h2>
                     <p><a href="{{route('site.categoria',['categoria_id'=>$categoria->id])}}">Veja todas as postagens dessa categoria</a></p>
                    </div>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row g-5">
                        <div class="col-lg-4">
                            <h5>O mais visto dessa categoria</h5>
                            <div class="post-list lg">
                                <a href="{{route('site.post',['post'=>$categoria->postagensMaisVistas->first()->link])}}"><img src="{{URL::asset('images/postagens/'.$categoria->postagensMaisVistas->first()->imagem)}}" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{$categoria->nome}}</span> <span class="mx-1">•</span> <span>{{\Carbon\Carbon::parse($categoria->postagensMaisVistas->first()->updated_at)->format('d/m/Y H:i')}}</span></div>
                                <h2><a href="{{$categoria->postagensMaisVistas->first()->link}}">{{$categoria->postagensMaisVistas->first()->titulo}}</a></h2>
                                <span class="mb-4 d-block">{{mb_strimwidth( strip_tags( $categoria->postagensMaisVistas->first()->descricao),0,300,"...")}}</span>

                                <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="{{URL::asset('images/users/'.$categoria->postagensMaisVistas->first()->usuario->img)}}" alt="" class="img-fluid"></div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{$categoria->postagensMaisVistas->first()->usuario->name}}</h3>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-lg-8">
                            <div class="row g-5">
                                <div class="col-lg-4 border-start custom-border">
                                    <h5>Ultimos postados</h5>
                                    @foreach($categoria->postagensMaisRecentes->take(4) as $postagem)
                                        <div class="post-list">
                                            <a href="{{route('site.post',['post'=>$postagem->link])}}"><img src="{{URL::asset('images/postagens/'.$postagem->imagem)}}" alt="" class="img-fluid"></a>
                                            <div class="post-meta"><span class="date">{{$categoria->nome}}</span> <span class="mx-1">•</span> <span>{{\Carbon\Carbon::parse($postagem->updated_at)->format('d/m/Y')}}</span></div>
                                            <h2><a href="{{route('site.post',['post'=>$postagem->link])}}">{{$postagem->titulo}}</a></h2>
                                        </div>


                                    @endforeach


                                </div>
                                <div class="col-lg-4 border-start custom-border">
                                    <h5>Primeiros </h5>
                                    @foreach($categoria->postagensMenosRecentes->take(4) as $postagem)
                                        <div class="post-list">
                                            <a href="{{route('site.post',['post'=>$postagem->link])}}"><img src="{{URL::asset('images/postagens/'.$postagem->imagem)}}" alt="" class="img-fluid"></a>
                                            <div class="post-meta"><span class="date">{{$categoria->nome}}</span> <span class="mx-1">•</span> <span>{{\Carbon\Carbon::parse($postagem->updated_at)->format('d/m/Y')}}</span></div>
                                            <h2><a href="{{route('site.post',['post'=>$postagem->link])}}">{{$postagem->titulo}}</a></h2>
                                        </div>


                                    @endforeach

                                </div>
                                <div class="col-lg-4">
                                    <h5>Os mais vistos </h5>
                                    @foreach($categoria->postagensMaisVistas->take(5) as $i=>$postagem)
                                        @if($i != 0)
                                            <div class="post-list">
                                                <a href="{{route('site.post',['post'=>$postagem->link])}}"><img src="{{URL::asset('images/postagens/'.$postagem->imagem)}}" alt="" class="img-fluid"></a>
                                                <div class="post-meta"><span class="date">{{$categoria->nome}}</span> <span class="mx-1">•</span> <span>{{\Carbon\Carbon::parse($postagem->updated_at)->format('d/m/Y')}}</span></div>
                                                <h2><a href="{{route('site.post',['post'=>$postagem->link])}}">{{$postagem->titulo}}</a></h2>
                                            </div>
                                        @endif



                                    @endforeach


                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </section><!-- /Lifestyle Category Section -->


        @endif


    @endforeach


@endsection
