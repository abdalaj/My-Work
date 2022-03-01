

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="{{ asset('materio/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('materio/css/style.css') }}">
    <style>
        *{
            overflow: hidden;
        }
    </style>
</head>
<body>

   <div class="login-container">
       <div class="l-side" id="full-height">
          <div class="content"></div>
          <div class="svg"></div>
       </div>
       <div class="r-side">
           <div class="content">
               <h1>Welcome to EasyApps! 👋🏻</h1>
               <p>Please sign-in to your account and start the adventure</p>
               <br>
               <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <input name="email" type="text" class="entry" placeholder="User Name"  list="user" type="text" style="font-weight: bold; font-size: 22px" placeholder="@lang('front.username')" required/>
                    <datalist id="user">
                        <option  value="{{optional(\App\User::orderBy('id','DESC')->first())->email}}">
                            {{optional(\App\User::orderBy('id','DESC')->first())->email}}
                        </option>
                    </datalist>
                    <br><br>
                    <div class="pass">
                        <input  type="password" class="entry" id="toggle-pass password" placeholder="Password" style="font-weight: bold; font-size: 22px" class="form-control form-control-user password" type="password" name="password" placeholder="@lang('front.password')" required><br>
                    </div>

                    <button type="submit" class="login">@lang('front.login')</button>
               </form>
               <br>

           </div>
       </div>
   </div>

    <script src="{{ asset('materio/js/jquery.min.js') }}"></script>
    <script src="{{ asset('materio/js/login.js') }}"></script>
</body>
</html>
