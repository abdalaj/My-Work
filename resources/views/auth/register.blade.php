<!DOCTYPE html>
<html lang="ar">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registartion</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/lib/getmdl-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lib/nv.d3.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/application.min.css')}}">
    <!-- endinject -->

</head>
<body>

<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
    <main class="mdl-layout__content">
        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
        <div class="mdl-card__supporting-text color--dark-gray">
            <div class="mdl-grid" >


                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">

                        <input id="name" type="text" class="mdl-textfield__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <label class="mdl-textfield__label" for="name">Name </label>
                    </div>


                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input id="email" type="email" class="mdl-textfield__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <label class="mdl-textfield__label" for="email">Email </label>

                    </div>




                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input id="password" type="password" class="mdl-textfield__input @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <label class="mdl-textfield__label" for="password">Password </label>
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <input id="password-confirm" type="password" class="mdl-textfield__input" name="password_confirmation"  autocomplete="new-password">

                        <label class="mdl-textfield__label" for="password-confirm">Confirm Password ( اعد ادخال كلمة السر )</label>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a  href="/">Login ( تسجيل دخول ) ? </a><br>
                    <input type="submit" value="SIGN UP" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                  </form>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>

<!-- inject:js -->
<script src="{{ asset('js/d3.min.js')}}"></script>
<script src="{{ asset('js/getmdl-select.min.js')}}"></script>
<script src="{{ asset('js/material.min.js')}}"></script>
<script src="{{ asset('js/nv.d3.min.js')}}"></script>
<script src="{{ asset('js/layout/layout.min.js')}}"></script>
<script src="{{ asset('js/scroll/scroll.min.js')}}"></script>
<script src="{{ asset('js/widgets/charts/discreteBarChart.min.js')}}"></script>
<script src="{{ asset('js/widgets/charts/linePlusBarChart.min.js')}}"></script>
<script src="{{ asset('js/widgets/charts/stackedBarChart.min.js')}}"></script>
<script src="{{ asset('js/widgets/employer-form/employer-form.min.js')}}"></script>
<script src="{{ asset('js/widgets/line-chart/line-charts-nvd3.min.js')}}"></script>
<script src="{{ asset('js/widgets/map/maps.min.js')}}"></script>
<script src="{{ asset('js/widgets/pie-chart/pie-charts-nvd3.min.js')}}"></script>
<script src="{{ asset('js/widgets/table/table.min.js')}}"></script>
<script src="{{ asset('js/widgets/todo/todo.min.js')}}"></script>
<!-- endinject -->

</body>
</html>
