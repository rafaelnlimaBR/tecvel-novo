<h4 class="comments-count">{{$postagem->comentarios->count()}} Comentários</h4>



@foreach($postagem->comentarios->where('ativo',true) as $comentario)

    <div id="comment-1" class="comment">
        <div class="d-flex">
            <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
            <div>
                <h5><a href="">{{$comentario->cliente->nome}}</a>
                    <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a>
                </h5>
                <time datetime="{{$comentario->created_at}}">{{\Carbon\Carbon::parse($comentario->created_at)->format('d/m/Y')}}</time>
                <p>
                    {{$comentario->descricao}}
                </p>
            </div>
        </div>
    </div><!-- End comment #1 -->


@endforeach


