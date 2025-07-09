@extends('front.layout001')
@section('conteudo')

    <section id="trending-category" class="trending-category section">

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row g-5">


                    <div class="col-lg-12">
                        <div class="row g-5">
                            @foreach($postagens as $postagem)
                                <div class="col-lg-4">

                                    <div class="post-entry lg">
                                        <a href="{{route('site.post',['post'=>$postagem->link])}}"><img src="{{URL::asset('images/postagens/'.$postagem->imagem)}}" alt="" class="img-fluid"></a>
                                        <div class="post-meta"><span class="mx-1"></span> <span>{{\Carbon\Carbon::parse($postagem->updated_at)->format('d/m/Y H:i')}}</span></div>
                                        <h2><a href="blog-details.html">{{$postagem->titulo}}</a></h2>
                                        {{mb_strimwidth( strip_tags( $postagem->descricao),0,300,"...")}}

                                        <div class="d-flex align-items-center author">
                                            <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                                            {{--<div class="name">
                                                <h3 class="m-0 p-0">Cameron Williamson</h3>
                                            </div>--}}
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                {{$postagens->links()}}
                </div> <!-- End .row -->
            </div>

        </div>

    </section>

@endsection
