<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> {{isset($titulo)?$titulo:"Tecvel - Eletrônica Automotiva"}}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('front/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/plugins/upload-image/image-uploader.css') }}" rel="stylesheet" type="text/css">

    <!-- Main CSS File -->
    <link href="{{ URL::asset('front/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ZenBlog
    * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
    * Updated: Aug 08 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
        .custom-pagination {
            color: #403f3f;
            border: 1px solid #7e1414;
            margin: 0 2px;
        }
        .custom-pagination  {
            background-color: #0fb6cc;
            border-color: #0fb6cc;
            color: white;
        }

        .custom-pagination .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<body class="starter-page-page">

<header id="header" class="header d-flex align-items-center sticky-top">
    <script src="{{ URL::asset('/js/jquery-3.2.1.min.js') }}"></script>
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">

            <img src="{{URL::asset('/images/logo.png')}}" alt="" height="80">
{{--            <h1 class="sitename">ZenBlog</h1>--}}
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{route('site.home')}}">Início</a></li>
                <li><a href="{{route('site.sobre')}}">Sobre</a></li>
                <li><a target="_new" href="{{route('site.orcamento')}}">Fazer Orçamento</a></li>
                <li class="dropdown"><a href="#"><span>Categorias</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach($categorias_menu as $categoria)
                            <li><a href="{{route('site.categoria',['categoria_id'=>$categoria->id])}}">{{$categoria->nome}}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li><a href="{{route('site.contato')}}">Contato</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

    </div>
</header>

<main class="main">
{{--

    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Starter Page</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Starter Page</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->
--}}

    @yield('conteudo')
</main>

<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">{{$nome_principal}}</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>{{$endereco}}</p>
                    <p>{{$cidade ." - ".$estado}}</p>
                    <p class="mt-3"><strong>Whatsapp:</strong> <span>{{$telefone}}</span></p>
                    <p><strong>Email:</strong> <span>{{$email}}</span></p>
                </div>
                <div class="social-links d-flex mt-4">

                    <a href="{{$instagram}}"><i class="bi bi-instagram"></i></a>

                </div>
            </div>

         {{--   <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Hic solutasetp</h4>
                <ul>
                    <li><a href="#">Molestiae accusamus iure</a></li>
                    <li><a href="#">Excepturi dignissimos</a></li>
                    <li><a href="#">Suscipit distinctio</a></li>
                    <li><a href="#">Dilecta</a></li>
                    <li><a href="#">Sit quas consectetur</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Nobis illum</h4>
                <ul>
                    <li><a href="#">Ipsam</a></li>
                    <li><a href="#">Laudantium dolorum</a></li>
                    <li><a href="#">Dinera</a></li>
                    <li><a href="#">Trodelas</a></li>
                    <li><a href="#">Flexo</a></li>
                </ul>
            </div>--}}

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">TECVEL</strong> <span>Todos direitos reservados</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->

<script src="{{ URL::asset('/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ URL::asset('front/vendor/aos/aos.js') }}"></script>
<script src="{{ URL::asset('/plugins/summernote/summernote-bs4.js') }}"></script>
<script src="{{ URL::asset('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript"  src="{{ URL::asset('/plugins/upload-image/dist/image-uploader.min.js') }}" rel="stylesheet" type="text/css"></script>


<!-- Main JS File -->
<script src="{{ URL::asset('front/js/main.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){


        $('.texto-notesummer').summernote({
        height: 300,
        minHeight: 200,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]

    });

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


        $('.phone').mask('(00) 0000-00009');
        $('.phone').blur(function(event) {
            if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
                $('#fone').mask('(00) 00000-0009');
            } else {
                $('#fone').mask('(00) 0000-00009');
            }
        });





        $(".atualizar-formulario").on('submit','#formulario-comentario',function () {
        // $("#formulario-comentario").submit(function () {

            var dados   = $(this).serialize();

            var rota    =   "{{route('site.post.comentar')}}";

            $.ajax({
                type: "POST",
                url: rota,
                data: dados,
                success: function( data )
                {
                    console.log(data);
                    if('error' in data){
                        alert(data.error);

                    }else{



                        $(".atualizar-formulario").html(data.formulario);
                        $(".todos-comentarios").html(data.comentarios);



                        return false
                    }
                },
                error:function (data,e) {
                    alert(e);
                }
            });

            return false;
        });

    })


</script>
</body>

</html>
