<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">

        <title>TECVEL | {{$titulo}}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Theme icon -->
        <link rel="shortcut icon" href="{{ URL::asset('/images/favicon.ico') }}">

        <!-- Theme Css -->
        <link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('/css/slidebars.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('/css/icons.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('/css/menu.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('/plugins/colorpicker/colorpicker.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
        <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
    </head>

    <body class="sticky-header">
        <section>
            <!-- sidebar left start-->
            <div class="sidebar-left">
                <div class="sidebar-left-info">

                    <div class="user-box">
                        <div class="d-flex justify-content-center">
                            <img src="{{URL::asset('images/users/avatar-1.jpg')}}" alt="" class="img-fluid rounded-circle">
                        </div>
                        <div class="text-center text-white mt-2">
                            <h6>Travis Watson</h6>
                            <p class="text-muted m-0">Admin</p>
                        </div>
                    </div>

                    <!--sidebar nav start-->
                    <ul class="side-navigation">
                        <li>
                            <h3 class="navigation-title">Navigation</h3>
                        </li>
                        <li>
                            <a href="{{route('cliente.index')}}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{route('contrato.index')}}"><i class="fa fa-tachometer"></i> <span>Contratos</span></a>
                        </li>
                        <li>
                            <a href="{{route('servico.index')}}"><i class="fa fa-tachometer"></i> <span>Servicos</span></a>
                        </li>
                        <li>
                            <a href="{{route('cliente.index')}}"><i class="fa fa-users"></i> <span>Clientes</span></a>
                        </li>
                        <li>
                            <a href="{{route('montadora.index')}}"><i class="fa fa-users"></i> <span>Montadoras</span></a>
                        </li>

                        <li>
                            <a href="{{route('modelo.index')}}"><i class="fa fa-users"></i> <span>Modelos</span></a>
                        </li>
                        <li>
                            <a href="{{route('veiculo.index')}}"><i class="fa fa-users"></i> <span>Veículos</span></a>
                        </li>
                        <li>
                            <a href="{{route('status.index')}}"><i class="fa fa-users"></i> <span>Status</span></a>
                        </li>
                        <li class="menu-list"><a href=""><i class="mdi mdi-buffer"></i> <span>UI Elements</span></a>
                            <ul class="child-list">
                                <li><a href="ui-typography.html"> Typography</a></li>
                                <li><a href="ui-buttons.html"> Buttons</a></li>
                                <li><a href="ui-cards.html"> Cards</a></li>
                                <li><a href="ui-tabs.html"> Tab & Accordions</a></li>
                                <li><a href="ui-modals.html"> Modals</a></li>
                                <li><a href="ui-bootstrap.html"> BS Elements</a></li>
                                <li><a href="ui-progressbars.html"> Progress Bars</a></li>
                                <li><a href="ui-notification.html">Notification</a></li>
                                <li><a href="ui-carousel.html"> Carousel</a></li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="navigation-title">Components</h3>
                        </li>
                        <li class="menu-list"><a href=""><i class="mdi mdi-google-circles-extended"></i> <span>Components <span
                                class="badge badge-primary noti-arrow pull-right">6</span> </span></a>
                            <ul class="child-list">
                                <li><a href="components-grid.html"> Grid</a></li>
                                <li><a href="components-calendar.html"> Calendar</a></li>
                                <li><a href="components-sweet-alerts.html"> Sweet Alerts </a></li>
                                <li><a href="components-portlets.html"> Portlets </a></li>
                                <li><a href="components-widgets.html"> Widgets </a></li>
                                <li><a href="components-nestable.html"> Nestable </a></li>
                                <li><a href="components-range-slider.html"> Range Slider </a></li>
                            </ul>
                        </li>
                        <li class="menu-list"><a href=""><i class="mdi mdi-diamond"></i> <span>Icons</span></a>
                            <ul class="child-list">
                                <li><a href="icons-material.html"> Material Design</a></li>
                                <li><a href="icons-font-awesome.html"> Font Awesome</a></li>
                                <li><a href="icons-themify.html"> Themify</a></li>
                            </ul>
                        </li>
                        <li class="menu-list"><a href="javascript:;"><i class="mdi mdi-table"></i> <span>Tables</span></a>
                            <ul class="child-list">
                                <li><a href="tables-basic.html"> Basic Table</a></li>
                                <li><a href="tables-datatable.html"> Data Table</a></li>
                                <li><a href="tables-editable.html"> Editable </a></li>
                                <li><a href="tables-responsive.html"> Responsive Table </a></li>
                            </ul>
                        </li>
                        <li class="menu-list"><a href=""><i class="mdi mdi-google-earth"></i> <span>Forms</span></a>
                            <ul class="child-list">
                                <li><a href="form-elements.html">General Elements</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-advanced.html">Advanced Form</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                                <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                <li><a href="form-imagecrop.html">Image Crop</a></li>
                                <li><a href="form-xeditable.html">X-Editable</a></li>
                                <li><a href="form-summernote.html">Summernote</a></li>
                            </ul>
                        </li>
                        <li class="menu-list"><a href=""><i class="mdi mdi-chart-arc"></i> <span>Charts </span></a>
                            <ul class="child-list">
                                <li><a href="chart-morris.html">Morris Chart</a></li>
                                <li><a href="chart-chartjs.html">Chartjs</a></li>
                                <li><a href="chart-flot.html">Flot Chart</a></li>
                                <li><a href="chart-peity.html">Peity Chart</a></li>
                                <li><a href="chart-knob.html">Knob Chart</a></li>
                            </ul>
                        </li>
                        <li class="menu-list"><a href=""><i class="mdi mdi-email" aria-hidden="true"></i><span>Mail </span></a>
                            <ul class="child-list">
                                <li><a href="email-inbox.html">Inbox</a></li>
                                <li><a href="email-compose.html">Compose mail</a></li>
                                <li><a href="email-read.html">View Mail</a></li>
                            </ul>
                        </li>
                        <li class="menu-list"><a href=""><i class="mdi mdi-newspaper" aria-hidden="true"></i><span>Email Templates</span></a>
                            <ul class="child-list">
                                <li><a href="email-template-alert.html">Alert</a></li>
                                <li><a href="email-template-action.html">Action</a></li>
                                <li><a href="email-template-billing.html">Billing</a></li>
                            </ul>
                        </li>
                        <li class="menu-list"><a href=""><i class="mdi mdi-map" aria-hidden="true"></i><span>Maps</span></a>
                            <ul class="child-list">
                                <li><a href="maps-gmap.html">Google Map</a></li>
                                <li><a href="maps-vector.html">Vector Map</a></li>
                            </ul>
                        </li>
                        <li class="menu-list nav-active active"><a href=""><i class="mdi mdi-book-multiple" aria-hidden="true"></i><span>Pages</span></a>
                            <ul class="child-list">
                                <li><a href="pages-profile.html">Profile</a></li>
                                <li><a href="pages-timeline.html">Timeline</a></li>
                                <li><a href="pages-invoice.html">Invoice</a></li>
                                <li><a href="pages-contact.html">Contact-list</a></li>
                                <li><a href="pages-login.html">Login</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                <li class="active"><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-404.html">404 Error</a></li>
                                <li><a href="pages-500.html">500 Error</a></li>
                            </ul>
                        </li>
                    </ul><!--sidebar nav end-->
                </div>
            </div><!-- sidebar left end-->

            <!-- body content start-->
            <div class="body-content">
                <!-- header section start-->
                <div class="header-section">
                    <!--logo and logo icon start-->
                    <div class="logo">
                        <a href="index.html">
                            <span class="logo-img">
                                <img src="{{URL::asset('/images/logo_sm.png')}}" alt="" height="26">
                            </span>
                            <!--<i class="fa fa-maxcdn"></i>-->
                            <span class="brand-name">Syntra</span>
                        </a>
                    </div>

                    <!--toggle button start-->
                    <a class="toggle-btn"><i class="ti ti-menu"></i></a>
                    <!--toggle button end-->

                    <!--mega menu start-->
                    <div id="navbar-collapse-1" class="navbar-collapse collapse mega-menu">
                        <ul class="nav navbar-nav">
                            <!-- Classic dropdown -->
                            <li class="dropdown">
                                <a href="javascript:;" data-toggle="dropdown" class=""> English <i class="mdi mdi-chevron-down"></i> </a>
                                <ul role="menu" class="dropdown-menu language-switch">
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> German </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Italian </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> French </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Spanish </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:;"> Russian </a>
                                    </li>
                                </ul>
                            </li>
                             <!-- Classic list -->
                            <li>
                                <form class="search-content" action="index.html" method="post">
                                    <input type="text" class="form-control mt-3" name="keyword" placeholder="Search...">
                                    <span class="search-button"><i class="ti ti-search"></i></span>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!--mega menu end-->

                    <div class="notification-wrap">
                        <!--right notification start-->
                        <div class="right-notification">
                            <ul class="notification-menu">
                                <li>
                                    <a href="javascript:;" class="notification" data-toggle="dropdown">
                                        <i class="mdi mdi-bell-outline"></i>
                                        <span class="badge badge-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu mailbox dropdown-menu-right">
                                        <li>
                                          <div class="drop-title">Notifications</div>
                                        </li>
                                        <li class="notification-scroll">
                                            <div class="message-center">
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-star"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Jane A. Seward</h6>
                                                        <span class="mail-desc">Iwon meddle and...</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-heart"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Michael W. Salazar</h6>
                                                        <span class="mail-desc">Lovely gide learn for you...</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-image"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>David D. Chen</h6>
                                                        <span class="mail-desc">Send his new photo...</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-bell"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Irma J. Hendren</h6>
                                                        <span class="mail-desc">6:00 pm our meeting so...</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="text-center bg-light" href="javascript:void(0);">
                                                <strong>See all notifications</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:;" class="notification" data-toggle="dropdown">
                                        <i class="mdi mdi-email-outline"></i>
                                        <span class="badge badge-danger">9</span>
                                    </a>
                                    <ul class="dropdown-menu mailbox dropdown-menu-right">
                                        <li>
                                            <div class="drop-title">New Messages 5</div>
                                        </li>
                                        <li class="notification-scroll">
                                            <div class="message-center">
                                                <a href="#">
                                                    <div class="user-img">
                                                         <img src="{{URL::asset('images/users/avatar-2.jpg')}}" alt="user" class="rounded-circle">
                                                         <span class="profile-status online pull-right"></span>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Cassie T. Bishop</h6>
                                                        <span class="mail-desc">Just see the my admin!</span>
                                                        <span class="time">9:30 AM</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <img src="{{URL::asset('images/users/avatar-3.jpg')}}" alt="user" class="rounded-circle">
                                                        <span class="profile-status busy pull-right"></span>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Rudy A. Scott</h6>
                                                        <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <img src="{{URL::asset('images/users/avatar-4.jpg')}}" alt="user" class="rounded-circle">
                                                        <span class="profile-status away pull-right"></span>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Kevin D. Jernigan</h6>
                                                        <span class="mail-desc">I am a singer!</span>
                                                        <span class="time">9:08 AM</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <img src="{{URL::asset('images/users/avatar-5.jpg')}}" alt="user" class="rounded-circle">
                                                        <span class="profile-status offline pull-right"></span>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Jane A. Seward</h6>
                                                        <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="text-center bg-light" href="javascript:void(0);"> <strong>See all notifications</strong> </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:;" data-toggle="dropdown">
                                        <img src="{{URL::asset('images/users/avatar-1.jpg')}}" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-menu">
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><span class="badge badge-success pull-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                                <li>
                                    <div class="sb-toggle-right">
                                        <i class="mdi mdi-apps"></i>
                                    </div>
                                </li>
                            </ul>
                        </div><!--right notification end-->
                    </div>
                </div>
                <!-- header section end-->

                <div class="container-fluid">

                    @include('admin.includes.alerta')
                    @yield('conteudo')


                </div><!--end container-->

                <!--footer section start-->
                <footer class="footer">
                    2018 &copy; Syntra.
                </footer>
                <!--footer section end-->


                <!-- Right Slidebar start -->
                <div class="sb-slidebar sb-right sb-style-overlay">
                    <div class="right-bar slimscroll">
                        <span class="r-close-btn sb-close"><i class="fa fa-times"></i></span>

                        <ul class="nav nav-tabs nav-justified-">
                            <li class="">
                                <a href="#chat" class="active" data-toggle="tab">Chat</a>
                            </li>
                            <li class="">
                                <a href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab">Settings</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="chat">
                                <div class="online-chat">
                                    <div class="online-chat-container">
                                        <div class="chat-list">
                                            <form class="search-content" action="index.html" method="post">
                                                <input type="text" class="form-control" name="keyword" placeholder="Search...">
                                                <span class="search-button"><i class="ti ti-search"></i></span>
                                            </form>
                                        </div>
                                        <div class="side-title-alt">
                                            <h2>online</h2>
                                        </div>

                                        <ul class="team-list chat-list-side">
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="" alt="">
                                                        <i class="online dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Alison Jones</span>
                                                        <small class="text-muted">Start exploring</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="{{URL::asset('images/users/avatar-3.jpg')}}" alt="">
                                                        <i class="online dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Jonathan Smith</span>
                                                        <small class="text-muted">Alien Inside</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="{{URL::asset('images/users/avatar-4.jpg')}}" alt="">
                                                        <i class="away dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Anjelina Doe</span>
                                                        <small class="text-muted">Screaming...</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="{{URL::asset('images/users/avatar-5.jpg')}}" alt="">
                                                        <i class="busy dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Franklin Adam</span>
                                                        <small class="text-muted">Don't lose the hope</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="{{URL::asset('images/users/avatar-6.jpg')}}" alt="">
                                                         <i class="online dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Jeff Crowford </span>
                                                        <small class="text-muted">Just flying</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="side-title-alt mb-3">
                                            <h2>Friends</h2>
                                        </div>
                                        <ul class="list-unstyled friends">
                                            <li>
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{URL::asset('images/users/avatar-7.jpg')}}" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{URL::asset('images/users/avatar-8.jpg')}}" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{URL::asset('images/users/avatar-9.jpg')}}" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{URL::asset('images/users/avatar-10.jpg')}}" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{URL::asset('images/users/avatar-2.jpg')}}" alt="">
                                                </a>
                                            </li>
                                             <li>
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{URL::asset('images/users/avatar-1.jpg')}}" alt="">
                                                </a>
                                            </li>
                                             <li>
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{URL::asset('images/users/avatar-3.jpg')}}" alt="">
                                                </a>
                                            </li>
                                             <li>
                                                <a href="#">
                                                    <img class="rounded-circle" src="{{URL::asset('images/users/avatar-4.jpg')}}" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane " id="activity">

                                <div class="aside-widget">
                                    <div class="side-title-alt">
                                        <h2>Recent Activity</h2>
                                    </div>
                                    <ul class="team-list chat-list-side info">
                                        <li>
                                            <span class="thumb-small">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            <div class="inline">
                                                <span class="name">Mary Brown open a new company</span>
                                                <span class="time">just now</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="thumb-small">
                                                <i class="fa fa-user-plus"></i>
                                            </span>
                                            <div class="inline">
                                                <span class="name">Mary Brown send a new message </span>
                                                <span class="time">50 min ago</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="thumb-small">
                                                <i class="fa fa-wrench"></i>
                                            </span>
                                            <div class="inline">
                                                <span class="name">Holly Cobb Uploaded 6 new photos.</span>
                                                <span class="time">3 Week Ago</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="thumb-small">
                                                <i class="fa fa-users"></i>
                                            </span>
                                            <div class="inline">
                                                <span class="name">Mary Brown open a new company.</span>
                                                <span class="time">1 Month Ago</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="aside-widget">

                                    <div class="side-title-alt">
                                        <h2>Events</h2>
                                    </div>
                                    <ul class="team-list chat-list-side info statistics border-less-list">
                                        <li>
                                            <div class="inline">
                                                <p class="mb-1">Jamie Miller</p>
                                                <span class="name">Contrary to popular belief, Lorem Ipsum is not simply random text.</span>
                                                <span class="time text-muted">2 Week Ago</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="inline">
                                                <p class="mb-1">Robert Jones</p>
                                                <span class="name">Lorem Ipsum is simply dummy text of the printing and typesetting .</span>
                                                <span class="time text-muted">1 Month Ago</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane " id="settings">
                                <div class="side-title-alt">
                                    <h6 class="mb-0">Account Setting</h6>
                                </div>
                                <ul class="team-list chat-list-side info statistics border-less-list setting-list">
                                    <li>
                                        <div class="inline">
                                            <span class="name">Auto updates</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>
                                    <li>
                                        <div class="inline">
                                            <span class="name">Show offline Contacts</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>

                                    <li>
                                        <div class="inline">
                                            <span class="name">Location Permission</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>
                                </ul>

                                <div class="side-title-alt">
                                    <h6 class="mb-0">General Setting</h6>
                                </div>
                                <ul class="team-list chat-list-side info statistics border-less-list setting-list">
                                    <li>
                                        <div class="inline">
                                            <span class="name">Show me Online</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>
                                    <li>
                                        <div class="inline">
                                            <span class="name">Status visible to all</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>

                                    <li>
                                        <div class="inline">
                                            <span class="name">Notifications</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end Right Slidebar-->
            </div>
            <!--end body content-->
        </section>

        <!-- jQuery -->
        <script src="{{ URL::asset('/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ URL::asset('/js/popper.min.js') }}"></script>
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('/js/jquery-migrate.js') }}"></script>
        <script src="{{ URL::asset('/js/modernizr.min.js') }}"></script>
        <script src="{{ URL::asset('/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ URL::asset('/js/slidebars.min.js') }}"></script>
        <script src="{{ URL::asset('/plugins/colorpicker/jquery-asColor.js') }}"></script>
        <script src="{{ URL::asset('/plugins/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ URL::asset('/plugins/webcam/webcam.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>






        <!--app js-->
        <script src="{{ URL::asset('/js/jquery.app.js') }}"></script>

        <script type="text/javascript">

            Webcam.set({

                width: 490,

                height: 390,

                image_format: 'jpeg',

                jpeg_quality: 90

            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            $('.cep').mask('00000-000');
            $('.dinheiro').mask("00000000.00" , { reverse:true});
            $('#texto-notesummer').summernote({
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
            $('.caixa-alta').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });
            $('.caixa-baixa').keyup(function() {
                this.value = this.value.toLocaleLowerCase();
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
            $('.date-time').datepicker({
                dateFormat: "dd/mm/yy"
            });

            $('#btn-camera').click(function () {
                Webcam.attach( '#camera' );
                $('#modalCamera').modal('show');

            });

            $('.botao-mudar-status').click(function(){
                var status      =   $(this).attr('status');

                $('#id-modal-status').val(status);
                $('#modal-mudar-status').modal("show")
            });
            $("#tabela-proximos-status").on('click','.desvincular-status',function () {

                var id          =   $(this).attr("status");
                var proximo      =   $(this).attr("proximo-status");
                alert('deu');
                var rota    =   "{{route('status.desvincularStatus')}}";


                $.ajax({
                    type: "POST",
                    url: rota,
                    data: {

                        'id'                :   id,
                        'proximo'            :   proximo,
                    },
                    success: function( data )
                    {

                        if('erro' in data){
                            alert(data.erro);

                        }else{
                            $('#tabela-proximos-status').html(data.status);
                            return false
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });

                return false;
            });
            $("#form-vincular-status").submit(function () {

                var dados   = $(this).serialize();

                var rota    =   "{{route('status.vincularStatus')}}";

                $.ajax({
                    type: "POST",
                    url: rota,
                    data: dados,
                    success: function( data )
                    {

                        if('erro' in data){
                            alert(data.erro);

                        }else{

                            $('#tabela-proximos-status').html(data.status);
                            return false
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });

                return false;
            });

            $("#cadastrarVeiculoModal").submit(function () {

                var dados   = $(this).serialize();

                var rota    =   "{{route('veiculo.cadastrar')}}";

                $.ajax({
                    type: "POST",
                    url: rota,
                    data: dados,
                    success: function( data )
                    {

                        if('erro' in data){
                            alert(data.erro);

                        }else{

                            var html    =   '<option value='+data.id+'> '+ data.placa+'</option>';
                            // $('.select2-user-result').html('teste');
                            $("#pesquisa-veiculo").html(html);
                            $('#formularioVeiculoModal').modal('hide');


                            return false
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });

                return false;
            });

            $("#tabela-servicos-atualizavel").on('click','.btn-remover-servico-historico',function () {

                if(confirm("Deseja remover esse servico?")){
                    var servico_id      =   $(this).attr('servico_id');
                    var historico_id    =   $(this).attr('historico_id');
                    var rota            =   $(this).attr('route_delete');

                    $.ajax({
                        header:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        },
                        url: rota,
                        type: "post",
                        data: {

                            'servico_id'                :   servico_id,
                            'historico_id'              :   historico_id

                        },
                        success: function( data )
                        {
                            if('erro' in data){
                                alert(data.erro);

                            }else{
                                $('#tabela-servicos-atualizavel').html(data.servico);
                                return false
                            }

                        },
                        error:function (data) {
                            console.log(data)
                        }
                    });
                }

            })

            $("#tabela-pecas-atualizavel").on('click','.btn-remover-peca-historico',function () {

                if(confirm("Deseja remover esse peca?")){
                    var peca_id      =   $(this).attr('peca_id');
                    var historico_id    =   $(this).attr('historico_id');
                    var rota            =   $(this).attr('route_delete');

                    $.ajax({
                        header:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        },
                        url: rota,
                        type: "post",
                        data: {

                            'peca_id'                :   peca_id,
                            'historico_id'              :   historico_id

                        },
                        success: function( data )
                        {
                            if('erro' in data){
                                alert(data.erro);

                            }else{
                                $('#tabela-pecas-atualizavel').html(data.peca);
                                return false
                            }

                        },
                        error:function (data) {
                            console.log(data)
                        }
                    });
                }

            });
            function calcularTaxa(taxa, valor,repassarTaxa){

                var valorTotal  =   0;
                if(repassarTaxa == true){
                    valorTotal  =   (valor*100)/(100-taxa);
                }else{
                    valorTotal  =   (valor * (100 - taxa))/100;
                }


                return valorTotal.toFixed(2);
            }
            function atualizarDadosPagamentos(){

                var repassarTaxa    =   $('#repassar').is(':checked');
                var valor =     parseFloat($('#valor').val());

                var taxa    =   parseFloat($('#taxa').val());
                var forma   =   $('#forma-pagamentos').find(":selected").text();
                var valorTaxa   =   0;
                var valorLiquido=  0;



                if(repassarTaxa == true){
                    valorTaxa       = calcularTaxa(taxa,valor,repassarTaxa);
                    $('#resultado-valor-taxa').html('R$ '+valorTaxa);
                    $('#resultado-valor').html('R$ '+valor);
                    $('#valor-liquido').val(valor);
                    $('#valor-com-taxa').val(valorTaxa);
                }else{
                    valorLiquido    =   calcularTaxa(taxa,valor,repassarTaxa);
                    $('#resultado-valor-taxa').html('R$ '+valor);
                    $('#resultado-valor').html('R$ '+valor);
                    $('#valor-liquido').val(valorLiquido);
                    $('#valor-com-taxa').val(valor);
                }
                $('#resultado-forma').html(forma);

            }
            $('#repassar').change(function () {
                atualizarDadosPagamentos();
            })
            $('#valor').keyup(function () {
                if(!$(this).val()){
                    $(this).val(0.00)

                }

                atualizarDadosPagamentos();

            })
            $("#forma-pagamentos").change(function () {
                var rota    =   "{{route('forma.json')}}";
                var id      =   $(this).val();

                $.ajax({
                    type: "get",
                    url: rota,
                    data: {
                        'id'       :   id
                    },
                    success: function( data )
                    {

                        if('erro' in data){
                            alert(data.erro);

                        }else{
                            $('#taxa').val(data.taxa)
                            atualizarDadosPagamentos();
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });
            });
            $("#tipos_pagamentos").change(function () {
                var rota    =   "{{route('tipo.formas.json')}}";
                var id      =   $(this).val();

                $.ajax({
                    type: "get",
                    url: rota,
                    data: {
                        'id'       :   id
                    },
                    success: function( data )
                    {
                        if('erro' in data){
                            alert(data.erro);

                        }else{
                            $("#forma-pagamentos").html('');
                            for(var i=0; i<data.length;i++){
                                var valor   =   parseFloat($('#valor').val());
                                if(i==0){


                                    var taxa    =   parseFloat(data[i].taxa);
                                    // $('#valor-com-taxa').val(calcularTaxa(taxa,valor));/

                                    $('#taxa').val(taxa);
                                    atualizarDadosPagamentos();

                                }
                                $("#forma-pagamentos").append("<option value='" +
                                    data[i].id + "'>"+data[i].nome+"</option>");
                                    atualizarDadosPagamentos();
                            }
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });
            });

            $("#servicos").on('click','.btn-atualizar-servico-historico',function () {

                var servico_id      =   $(this).attr('servico_id');
                var rota            =   $(this).attr('route_update');
                var valor           =   $('#valor-servico-'+servico_id).val();
               var cobrar           =   $('#cobrar-servico-'+servico_id).val();
               var  contrato_id     =   $(this).attr('contrato_id');

                $.ajax({
                    header:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    url: rota,
                    type: "post",
                    data: {

                        'servico_id'                :   servico_id,
                        'valor'              :   valor,
                        'cobrar'            :   cobrar,
                        'contrato_id'       :   contrato_id

                    },
                    success: function( data )
                    {
                        if('erro' in data){
                            alert(data.erro);

                        }else{

                            $('#tabela-servicos-atualizavel').html(data.servico);
                            return false
                        }

                    },
                    error:function (data) {
                        console.log(data)
                    }
                });
            });

            $("#pecas").on('click','.btn-atualizar-peca-historico',function () {

                var peca_id      =   $(this).attr('peca_id');
                var rota            =   $(this).attr('route_update');
                var valor           =   $('#valor-peca-'+peca_id).val();
                var cobrar           =   $('#cobrar-peca-'+peca_id).val();
                var marca           =   $('#marca-peca-'+peca_id).val();
                var  contrato_id     =   $(this).attr('contrato_id');

                $.ajax({
                    header:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    url: rota,
                    type: "post",
                    data: {

                        'peca_id'                :   peca_id,
                        'valor'              :   valor,
                        'cobrar'            :   cobrar,
                        'contrato_id'       :   contrato_id,
                        'marca'             :   marca

                    },
                    success: function( data )
                    {
                        if('erro' in data){
                            alert(data.erro);

                        }else{
                            console.log(data);
                            $('#tabela-pecas-atualizavel').html(data.peca);
                            return false
                        }

                    },
                    error:function (data) {
                        console.log(data)
                    }
                });
            });

            $("#form-adicionar-servico-historico").submit(function () {
                var dados   = $(this).serialize();

                var rota    =   "{{route('contrato.adicionar.servico')}}";

                $.ajax({
                    type: "POST",
                    url: rota,
                    data: dados,
                    success: function( data )
                    {

                        if('erro' in data){
                            alert(data.erro);

                        }else{

                            $('#tabela-servicos-atualizavel').html(data.servico);
                            return false
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });


                return false;
            });

            $("#form-adicionar-peca-historico").submit(function () {
                var dados   = $(this).serialize();

                var rota    =   "{{route('contrato.adicionar.peca')}}";

                $.ajax({
                    type: "POST",
                    url: rota,
                    data: dados,
                    success: function( data )
                    {

                        if('erro' in data){
                            alert(data.erro);

                        }else{
                                // console.log(data);
                            $('#tabela-pecas-atualizavel').html(data.peca);
                            $('#input-peca').val("");
                            $('#valor-peca').val("");
                            $('#marca-peca').val("");
                            $('#input-peca').focus();
                            return false
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });


                return false;
            });

            $("#cadastrarClienteModal").submit(function () {

                var dados   = $(this).serialize();

                var rota    =   "{{route('cliente.cadastrar')}}";

                $.ajax({
                    type: "POST",
                    url: rota,
                    data: dados,
                    success: function( data )
                    {

                        if('erro' in data){
                            alert(data.erro);

                        }else{
                            var html    =   '<option value='+data.id+'>'+data.nome+'</option>'
                            $("#pesquisa-cliente").html(html);
                            $('#formularioClienteModal').modal('hide');
                            return false
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });

                return false;
            });

            $("#pesquisa-cliente").select2({

                // placeholder: "Selecione um cliente",
                ajax: {
                    type: 'POST',
                    url: "{{route('cliente.pesquisar.json')}}",
                    dataType: 'json',

                    beforeSend: function (xhr) {
                        var token = $("meta[name='csrf-token']" ).val();

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    quietMillis: 400,
                    delay:400,
                    data: function (term, page) {

                        return {
                            q: term.term, //search term
                            // page size
                        };
                    },
                    processResults: function (data) {

                        return {
                            results: data
                        };
                    },
                },
                templateResult: function (data) {

                    var html    =   $('<div class="select2-user-result"><h5>'+data.nome+'</h5>' +
                        '<h6>Telefone: <b>'+data.telefone+'</b></h6>'+

                        '</div>'
                    );
                    return html;
                },
                templateSelection:function (data) {
                    var rota    =   "{{route('cliente.editar',['id'=>':id'])}}";
                    rota = rota.replace(':id',data.id);
                   $('#editar-cliente').html(' <a class="btn btn-sm btn-warning"  href="'+rota+'" target="_new">Editar</a>');
                    var html    =   $('<div class="select2-user-result"><b>Cliente: </b>'+data.text+'</div><br>'
                    );
                    return html;
                },

            });


            $("#servicos-nome").keyup(function () {
                var nome = $(this).val();
                var rota    =   '{{route('servico.json')}}';
                // console.log(rota);
                $.ajax({
                    header:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    url: rota,
                    type: "get",
                    data: {

                        'nome'                :   nome,
                    },
                    success: function( data )
                    {
                        $('#pecas-datalista-atualizaval').empty();
                        for(var i=0; i<data.length;i++){
                            $("#servicos-datalista-atualizaval").append("<option value='" +
                                data[i].nome + "'></option>");

                        }

                    },
                    error:function (data) {
                        console.log(data)
                    }
                });
            });

            $("#servicos-select2").select2({
                ajax: {
                    type: 'get',
                    url: "{{route('servico.json')}}",
                    dataType: 'json',

                    beforeSend: function (xhr) {
                        var token = $("meta[name='csrf-token']" ).val();

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    quietMillis: 400,
                    delay:400,
                    data: function (term, page) {
                        console.log(term);
                        return {
                            q: term.term, //search term
                            // page size
                        };
                    },
                    processResults: function (data) {

                        return {
                            results: data
                        };
                    },
                },
                templateResult: function (data) {

                    var html    =   $('<div class="select2-user-result"><h5>'+data.nome+'</h5>' +
                        '</div>'
                    );
                    return html;
                },
                templateSelection:function (data) {
                    var html    =   $('<div class="select2-user-result">'+data.text+'</div><br>');

                    $('#valor-servico').val(data.valor);

                    return html;
                },

            });

            $('#input-peca').keyup(function () {
                var rota    =   '{{route('peca.json')}}';
                var q       =   $(this).val();
                $.ajax({
                    header:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    url: rota,
                    type: "get",
                    data: {

                        'q'                :   q,
                    },
                    success: function( data )
                    {
                        $('#lista-pecas').empty();
                        for(var i=0; i<data.length;i++){
                            $("#lista-pecas").append("<option value='" +
                                data[i].nome + "'></option>");

                        }

                    },
                    error:function (data) {
                        console.log(data)
                    }
                });

            })

            /*$("#pecas-select2").select2({
                ajax: {
                    type: 'get',
                    url: "{{route('peca.json')}}",
                    dataType: 'json',

                    beforeSend: function (xhr) {
                        var token = $("meta[name='csrf-token']" ).val();

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    quietMillis: 400,
                    delay:400,
                    data: function (term, page) {

                        return {
                            q: term.term, //search term
                            // page size
                        };
                    },
                    processResults: function (data) {

                        return {
                            results: data
                        };
                    },
                },
                templateResult: function (data) {

                    var html    =   $('<div class="select2-user-result"><h5>'+data.nome+'</h5>' +
                        '</div>'
                    );
                    return html;
                },
                templateSelection:function (data) {
                    var html    =   $('<div class="select2-user-result">'+data.text+'</div><br>');

                    $('#valor-peca').val(data.valor);

                    return html;
                },

            });*/

            $("#pesquisa-veiculo").select2({
                ajax: {
                    type: 'POST',
                    url: "{{route('veiculo.pesquisar.json')}}",
                    dataType: 'json',

                    beforeSend: function (xhr) {
                        var token = $("meta[name='csrf-token']" ).val();

                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    quietMillis: 400,
                    delay:400,
                    data: function (term, page) {

                        return {
                            q: term.term, //search term
                            // page size
                        };
                    },
                    processResults: function (data) {

                        return {
                            results: data
                        };
                    },
                },
                templateResult: function (data) {

                    var html    =   $('<div class="select2-user-result"><h5>'+data.modelo+" - "+data.placa+'</h5>' +
                        '<h6>Montadora: <b>'+data.montadora+'</b></h6>'+

                        '</div>'
                    );
                    return html;
                },
                templateSelection:function (data) {
                    var rota    =   "{{route('veiculo.editar',['id'=>':id'])}}";
                    rota = rota.replace(':id',data.id);
                    $('#editar-veiculo').html(' <a class="btn btn-sm btn-warning"  href="'+rota+'" target="_new">Editar</a>');
                    var html    =   $('<div class="select2-user-result"><b>Veículo: </b>'+data.text+'</div><br>');
                    return html;
                },

            });

            $("#tabela-atualizavel").on('click','.botao-editar',function () {


                var id          =   $(this).attr("contato");
                var numero      =   $('#numero-'+id.toString()).val();
                var responsavel =   $('#responsavel-'+id.toString()).val();
                var app         =   $('#app-'+id.toString()).val();
                var foreignkey  =   $(this).attr("foreignkey");
                var rota        =   $(this).attr("route-update");

                $.ajax({
                    header:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    url: rota,
                    type: "post",
                    data: {

                    'id'                :   id,
                    'numero'            :   numero,
                    'responsavel'       :   responsavel,
                    'app'               :   app,
                    'foreignkey'        :   foreignkey

                    },
                    success: function( data )
                    {
                        if('erro' in data){
                            alert(data.erro);

                        }else{
                            $('#tabela-atualizavel').html(data.contatos);
                        }

                    },
                    error:function (data) {
                        console.log(data)
                    }
                    });
            });

            //REMOVER CONTATOS
            $("#tabela-atualizavel").on('click','.botao-excluir',function () {
                var id          =   $(this).attr("contato");
                var foreignkey  =   $(this).attr("foreignkey");
                var rota        =   $(this).attr("route-delete");

                if(confirm('Deseja remover esse contato')){
                    $.ajax({
                    header:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    url: rota,
                    type: "post",
                    data: {

                    'id'                :   id,
                    'foreignkey'        :   foreignkey

                    },
                    success: function( data )
                    {
                        if('erro' in data){
                            alert(data.erro);

                        }else{

                            $('#tabela-atualizavel').html(data.contatos);
                        }

                    },
                    error:function (data) {
                        console.log(data)
                    }
                    });

                }

            });

            //ADICIONAR CONTATO
            $("form[name='adicionar-contato']").submit(function () {
            var dados   = $(this).serialize();

            var rota    =   this.action;
                if($('#numero-contato').val().trim().length == 0){
                    alert('campo numero esta vazio')
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: rota,
                    data: dados,
                    success: function( data )
                    {
                        if('erro' in data){
                            alert(data.erro);

                        }else{
                            $('#tabela-atualizavel').html(data.contatos);
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });
            return false;


            });

            $("form[name='cadastrar-servico-modal']").submit(function () {
                var dados   = $(this).serialize();

                var rota    =   this.action;


                $.ajax({
                    type: "POST",
                    url: rota,
                    data: dados,
                    success: function( data )
                    {
                        if('erro' in data){
                            alert(data.erro);

                        }else{
                            var html    =   '<option value='+data.id+'>'+data.nome+'</option>'
                            $("#servicos-select2").html(html);
                            $('#valor-servico').val(data.valor);
                            $('#modal-novo-servico').modal('hide');
                            $("#valor-servico").val(null);
                            $("#nome-servico").val(null);
                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });
                return false;


            });

        //PREENCHIMENTO AUTOMATICO DO CAMPO MONTADORA NA TELA DE VEICULOS

            $('.formulario-veiculo').on('change','#montadora-veiculos',function () {
                var id  =   $(this).val();
                $('#modelos-veiculos').val('');
                var rota    =   "{{route('montadora.modelos',['id'=>':id'])}}";
                rota        =   rota.replace(':id',id);
                var lista   =   "";

                $.ajax({
                    type: "GET",
                    url: rota,
                    success: function( data )
                    {

                        $('#modelos').empty();
                        for(var i=0; i<data.length;i++){
                            $("#modelos").append("<option value='" +
                                data[i].nome + "'></option>");

                        }
                    },
                    error:function (data,e) {
                        alert(data);
                    }
                });
            })

        {{--$('#select-modelo-veiculo').change(function () {--}}
        {{--    var id  =   $(this).val();--}}
        {{--    var showRoute = "{{route('modelo.Json',['id'=>':id'])}}";--}}
        {{--    $.getJSON(showRoute.replace(':id',id),function (dados) {--}}
        {{--        $('#input-marca-veiculo').val(dados.montadora);--}}
        {{--    })--}}
        {{--});--}}

        //PESQUISA POR CEP E PREENCHIMENTO AUTOMATICO
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
                                $("#ibge").val(dados.ibge);
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

        </script>


    </body>
</html>


