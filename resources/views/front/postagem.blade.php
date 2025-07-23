@extends('front.layout001')
@section('conteudo')
    <!-- Slider Section -->
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="{{URL::asset('/images/postagens/'.$postagem->imagem)}}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{$postagem->titulo}}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{$postagem->usuario->name}}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{\Carbon\Carbon::parse($postagem->created_at)->format('d/m/Y')}}</time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">{{$postagem->comentarios()->count()}}</a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $postagem->descricao  !!}

                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">Business</a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

                <!-- Blog Comments Section -->
                <section id="blog-comments" class="blog-comments section">

                    <div class="container todos-comentarios">

                        @include('front.includes.todos-comentarios')

                    </div>

                </section><!-- /Blog Comments Section -->

                <!-- Comment Form Section -->
                <section id="comment-form" class="comment-form section">
                    <div class="container atualizar-formulario">

                        @include('front.includes.formulario-comentario')

                    </div>
                </section><!-- /Comment Form Section -->

            </div>

            <div class="col-lg-4 sidebar">

                <div class="widgets-container">

                    <!-- Blog Author Widget -->


                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">Procurar</h3>
                        <form action="">
                            <input type="text">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>

                    </div><!--/Search Widget -->

                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">

                        <h3 class="widget-title">Postagens Recentes</h3>
                        @foreach($postagens_recentes as $post_recente)
                            <div class="post-item">
                                <img src="{{URL::asset('/images/postagens/'.$post_recente->imagem)}}" alt="" class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">{{$post_recente->titulo}}</a></h4>
                                    <time datetime="{{\Carbon\Carbon::parse($post_recente->created_at)->format('Y-m-d')}}">{{\Carbon\Carbon::parse($post_recente->created_at)->format('d/m/Y')}}</time>
                                </div>
                            </div><!-- End recent post item-->
                        @endforeach










                    </div><!--/Recent Posts Widget -->

                    <!-- Tags Widget -->
                    <div class="tags-widget widget-item">

                        <h3 class="widget-title">Tags</h3>
                        <ul>
                            @foreach($tags as $tag)
                                <li><a href="#">{{$tag}}</a></li>
                            @endforeach


                        </ul>

                    </div><!--/Tags Widget -->

                </div>

            </div>

        </div>
    </div>

@endsection
