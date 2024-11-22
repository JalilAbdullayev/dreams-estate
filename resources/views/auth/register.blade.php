<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="{{ asset("storage/settings/$settings->favicon") }}"/>
    <title>
        Qeydiyyat
    </title>
    <link rel="stylesheet" href="{{ asset('back/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/pages/login-register-lock.css') }}"/>
</head>

<body class="skin-default card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">
            {{ $settings->title }}
        </p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register"
         style="background-image:url({{ asset("back/images/background/login-register.jpg")}});">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" action="{{ route('register') }}" method="POST">
                    @csrf
                    <h3 class="text-center m-b-20">
                        Qeydiyyat
                    </h3>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input @class(["form-control", 'is-invalid' => $errors->get('name')]) type="text"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder="Ad" maxlength="255"/>
                        </div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input type="email" @class(["form-control", 'is-invalid' => $errors->get('email')])
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail"
                                   maxlength="255"/>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input type="tel" @class(["form-control", 'is-invalid' => $errors->get('phone')])
                            name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Telefon"
                                   maxlength="255"/>
                        </div>
                    </div>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="tel" @class(["form-control", 'is-invalid' => $errors->get('whatsapp')])
                            name="whatsapp" value="{{ old('whatsapp') }}" required autocomplete="phone"
                                   placeholder="WhatsApp" maxlength="255"/>
                        </div>
                    </div>
                    @error('whatsapp')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input type="password" @class(["form-control", 'is-invalid' => $errors->get('password')])
                            name="password" required autocomplete="new-password" placeholder="Şifrə" maxlength="255"
                                   minlength="8"/>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password-confirm" type="password" name="password_confirmation" required
                                   @class(["form-control", 'is-invalid' => $errors->get('password_confirmation')])
                                   autocomplete="new-password" placeholder="Təkrar Şifrə" maxlength="255"
                                   minlength="8"/>
                        </div>
                    </div>
                    <div class="form-group text-center p-b-20">
                        <div class="col-xs-12">
                            <button type="submit"
                                    class="btn btn-info btn-lg w-100 btn-rounded text-uppercase waves-effect waves-light text-white">
                                Qeydiyyat
                            </button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Hesabınız var? <a href="{{ route('login') }}" class="text-info m-l-5"><b>
                                    Giriş
                                </b>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset("back/node_modules/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset("back/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-bs-toggle="tooltip"]').tooltip()
    });
</script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/dark/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Sep 2023 20:43:23 GMT -->
</html>
