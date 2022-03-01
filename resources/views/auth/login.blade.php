<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>تسجيل الدخول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        @media(max-width:700px) {
            .card {
                width: 100% !important;
                box-shadow: 10px 10px #aaa
            }

            .card-body {
                padding: 0px 40px 40px 40px !important;
                border-radius: 8px;
            }

            .im {
                display: none;
            }
        }

    </style>
</head>

<body class="hold-transition login-page" dir="rtl">
    <div
        style="width: 90% !important;display: flex;position: absolute;top:50%;left: 50%;transform: translate(-50%,-50%);justify-content: space-between;align-items: stretch;height: calc(100vh - 150px);">
        <!-- /.login-logo -->
        <div class="card" style="width: 50%;margin: 0 !important;padding: 0 !important">
            <br>
            <br>
            <br>
            <br><br><br>
            <div class="card-body login-card-body">
                <marquee direction="right" class="login-box-msg">لما الانتظار؟ ابدأ ادارة حسابتك الان مع كنوز بدون اي
                    قلق♥☺</marquee>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group my-4">
                        <input id="email" style="text-align: left !important" type="text"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group my-4">
                        <input id="password" style="text-align: left !important" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mt-3">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل الدخول</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">التسجيل لاول مره</a>
      </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
        <div class="im" style="width: 50%;">
            <img src="{{ asset('dist/img/photo1.png') }}" style="width: 100%;height: 100% !important;" alt="">
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
