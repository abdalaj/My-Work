<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="name"
                            value="{{ old('Name') }}" autocomplete="Name" autofocus>
                        @error('Name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input id="Email" type="text" class="form-control @error('Email') is-invalid @enderror"
                            name="email" value="{{ old('Email') }}" autocomplete="Email" autofocus>
                        @error('Email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input id="Password" type="text" class="form-control @error('Password') is-invalid @enderror"
                            name="password" value="{{ old('Password') }}" autocomplete="Password" autofocus>
                        @error('Password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div><br>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>



            <a href="login.html" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min') }}"></script>
</body>

</html>
