<html>
@include('admin.includes.header-html')

<body class="sticky-header">
<section class="bg-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="wrapper-page">
                    <div class="account-pages">
                        <div class="account-box">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <img src="assets/images/logo_sm_2.png" alt="" class="">
                                        <h5 class="mt-3"><b>Welcome to Syntra</b></h5>
                                        @error('error')
                                            <h6 class="error">{{$message}}</h6>
                                        @enderror
                                    </div>
                                    <form class="form mt-5 contact-form" action="{{route('logar')}}" method="post">
                                        <div class="form-group ">
                                            <div class="col-sm-12">
                                                <input class="form-control form-control-line" type="text" placeholder="Email" name="email" value="{{old('email')}}">
                                                @csrf
                                                @error('email')
                                                    <span class="error">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-sm-12">
                                                <input class="form-control form-control-line" type="password" placeholder="Password" name="senha"  value="{{old('senha')}}">
                                                @error('senha')
                                                <span class="error">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-12">
                                                <label class="cr-styled">
                                                    <input type="checkbox" checked="">
                                                    <i class="fa"></i>
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12 mt-4">
                                                <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12 mt-4 text-center">
                                                <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot password?</a>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
@include('admin.includes.scripts')


</body>







</html>
