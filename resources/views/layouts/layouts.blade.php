<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title','الصفحه الرئيسيه')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa&display=swap" rel="stylesheet">
        <link rel="stylesheet" href=" {{ asset('dash/css/application.min.css')}}">
        <link rel="stylesheet" href=" {{ asset('styles/bootstrap.css')}}">
        <link rel="stylesheet" href=" {{ asset('styles/all.min.css')}}">
        <link rel="stylesheet" href=" {{ asset('dash/css/lib/getmdl-select.min.css')}}">
        <link rel="stylesheet" href=" {{ asset('dash/css/lib/nv.d3.min.css')}}">
        <link rel="stylesheet" href=" {{ asset('styles/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href=" {{ asset('styles/style.css')}}">
        <style>
            *{
            box-sizing: border-box;
            }


            .flex{
            display: flex;
            }
            .card{
            border: none;
            }
            .card img{
            border-top-right-radius: .25rem;
            border-top-left-radius: .25rem;
            width: 100%;
            height: 60%;
            }
            .zoom img {
            display: block;
            cursor: zoom-in;

                /* magnifying glass icon */
                .zoom:after {
                    content:'';
                    display:block;
                    width:33px;
                    height:33px;
                    position:absolute;
                    top:0;
                    right:0;
                }

            .zoom img::selection { background-color: transparent; }

            @media(max-width:576px){
            .container{
                width: 90%;
                margin:auto ;
            }
            .card{
                border: none;
                width: 49%;
            }
            }
            @media(max-width:320px){
            .container{
                width: 90%;
                margin:auto ;
            }
            .card{
                border: none;
                width: 100%;
            }
            }
        </style>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
        <style>
            *{
            font-family: 'Cairo', sans-serif;
            box-sizing: border-box;
            }
            .body{
            display: none;
            }
            body{
            background-color: rgba(200, 200, 200, .1);
            overflow: hidden;
            }
            .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #242f3f;
            display:flex;
            justify-content: center;
            align-items: center;
            z-index: 999999;
            }
            .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            border: 4px solid #Fff;
            animation: loader 2s infinite ease;
            }
            .loader-inner {
            vertical-align: top;
            display: inline-block;
            width: 100%;
            background-color: #fff;
            animation: loader-inner 2s infinite ease-in;
            }

            @keyframes loader {
            0% { transform: rotate(0deg);}
            25% { transform: rotate(180deg);}
            50% { transform: rotate(180deg);}
            75% { transform: rotate(360deg);}
            100% { transform: rotate(360deg);}
            }

            @keyframes loader-inner {
            0% { height: 0%;}
            25% { height: 0%;}
            50% { height: 100%;}
            75% { height: 100%;}
            100% { height: 0%;}
            }
            .flex{
            display: flex;
            }
            .card{
            border: none;
            }
            .card img{
            border-top-right-radius: .25rem;
            border-top-left-radius: .25rem;
            }
            ul{
            padding: 0 !important;
            }
        </style>
        <style>
          @media(max-width: 992px){
                      .counter{
                        display: none;
                      }
                    }
        </style>
         <style>
            .a{
              height:auto;
              padding: 100px 50px;
              background: #fff;
              position: relative;
              margin-bottom: 15px;
            }
            .b{
              width: auto;
            }
            .desktop .row.justify-content-between a{
              color: gray;
              text-decoration: none;
              font-size: 22px;
              text-transform: bold;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%,-50%);
            }
            @media(max-width:576px){
              .desktop .row.justify-content-between{
                display: flex;
                justify-content: space-between;
                align-items: center;
              }
              .a{
                width: 48%;
              }
              .b{
                width: 100%;
              }
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
        @yield('css')
    </head>
    @include('sweetalert::alert')

    <body style="background-color:#eee" dir="rtl">
        <section class="header"  >


            <div class="row justify-content-between align-items-center text-center m-auto " style="width: 90%;" >

                        <div class="logo col-8" style="margin-top: -10px;text-align: right;" >
                        <a href="/" style="font-weight: bold !important" >فاستر</a>
                        </div>

                        <div  class="counter" style="width: auto;text-align: left;">

                            <div >
                                <nav>
                                <ul style="list-style: none;margin: 0;padding: 0px !important;">
                                    <li class="label label--mini bg-primary " style="height: auto;font-weight: bold;" >
                                        <span style="font-weight:bold">
                                        عدد زوار الموقع حتي الان
                                        </span>
                                        &nbsp; &nbsp;
                                        <span class="num">

                                        </span>
                                    </li>
                                </ul>
                                </nav>
                            </div>

                        </div>

                        <div class="mobile col-3 p-0 col-2" style="text-align: left !important;">
                            <i class="fas fa-bars"></i>
                        </div>

                    <div class="w-100 my-3">
                        <div class="w-auto">
                            <div class="input-group mb-2 mr-sm-2 w-100">
                            <input type="text" class="form-control" id="search"  style="font-size: 18px;border-left: none !important;outline: none;" placeholder="مثال:- لابتوب ديل, جديد, محل علي, اسود قسط...............الخ" >
                            <select name="" id="types" style="width: auto;background: #fff;color: black;text-align: center !important;">
                                <option value="cl">ملابس</option>
                                <option value="ca">سيارات</option>
                                <option value="sh">احذيه</option>
                                <option selected value="el">الكترونيات</option>
                                <option value="co">كمبيوترات</option>
                                <option value="mo">موبايلات</option>
                                <option value="fo">اطعمه</option>
                                <option value="bu">عطور</option>
                                <option value="to">العاب</option>
                                <option value="ac">اكسسورات</option>
                                <option  value="bo">كتب</option>
                            </select>

                            </div>
                            <div id="found" >

                            </div>
                        </div>

                    </div>
                    <div  class="menu text-center " style="height: auto !important;">
                        <nav>
                            <ul>
                                <li><a href="/computers/"> كمبيوتر ولابتوب</a></li>
                                <li><a href="/mobiles/"> موبايلات</a></li>
                                <li><a href="/clothes/"> ملابس</a></li>
                                <li><a href="/shoes/"> احذيه</a></li>
                                <li><a href="/electronics/"> الكترونيات</a></li>
                                <li ><a href="/car/"> سيارات وماكينات</a></li>
                                <li><a href="/foods/"> طعام وسوبر ماركت</a></li>
                                <li><a href="/books/"> كتب</a></li>
                                <li><a href="/beauty/"> مستحضرات تجميل والعطور</a></li>
                                <li ><a href="/accessories/"> الاكسسورات</a></li>
                                <li style="border: none;"><a href="/toys/"> العاب</a></li>

                            </ul>
                        </nav>
                    </div>
            </div>

        </section>

        @yield('content')

          <div class="container text-center m-auto desktop" style="margin-top: 20px;">
            <div class="row justify-content-between ">
              <div class="col-4 col-md-4 col-sm-4 a">
                <a href="assets/faster-eg-windows.rar" download>تحميل الموقع لديسكتوب <span style="color: rgb(255, 4, 159);">ويندوز</span></a>
              </div>
              <div class="col-4 col-md-4 col-sm-4 a">
                <a href="assets/faster-eg-mac.rar" download>تحميل الموقع لديسكتوب <span style="color: rgb(255, 4, 159);">ماكنتوش</span></a>
              </div>
              <div class="col-4 col-md-4 col-sm-4 a">
                <a href="assets/faster-eg-linux.rar" download>تحميل الموقع لديسكتوب <span style="color: rgb(255, 4, 159);">لينكس</span></a>
              </div>

            </div><br>
            <div class="row justify-content-center" >
              <div class="col-4 col-sm-6 b">
                <a href="https://www.google.com" target="_blank">
                  <img style="width: 100%;height: 150px;" src="{{ asset('google.png')}}" >
                </a>
              </div>
              <div class="col-4 col-sm-6 b">
                <a href="https://www.appstore.com" target="_blank">
                  <img style="width: 100%;height: 150px;" src="{{ asset('apple.png') }}" >
                </a>
              </div>

            </div>
          </div><br>

          <section class="mt-4 py-5" style="background-color: #fff;">
            <div class=" container menu-footer row p-5 m-auto align-items-stretch justify-content-between text-center" style="padding: 100px;width:90%;">
              <div class=" ">
                <ul>
                  <li><a href="/car">سيارات ومعدات نقل</a></li>
                  <li><a href="/clothes/">الملابس</a></li>
                  <li><a href="/shoes/">الاحذيه</a></li>
                  <li><a href="/foods">الطعام وسوبر ماركت</a></li>
                  <li><a href="/books/">الكتب</a></li>
                  <li><a href="/computers/">الكمبيوتر</a></li>
                </ul>
              </div>
              <div class=" ">
                <ul>
                  <li><a href="/electronics/">الاجهزه الكهربائيه</a></li>
                  <li><a href="/electronics/">الالكترونيات</a></li>
                  <li><a href="/mobiles/">الموبايل</a></li>
                  <li><a href="/beauty/">مستحضرات التجميل والعطور</a></li>
                  <li><a href="/accessories/">الاكسسورات والمستلزمات الشخصيه</a></li>
                  <li><a href="/toys/">العاب</a></li>
                </ul>
              </div>
              <div class=" col-sm-12">
                <ul>
                  <li><a href="/about">اعرف اكتر عننا</a></li>
                  <li><a href="/contact">للتواصل معنا</a></li>
                  <li><a href="/private">سياسة الخصوصيه</a></li>
                  <li><a href="/sill">شروط البيع معانا</a></li>
                  <li><a href="/sill">للبيع معانا</a></li>
                  <li><a href="/recover">سياسة الاسترجاع</a></li>
                </ul>
              </div>


            </div>
          </section>


          <div class="talo">
            <a class="top">
              <i class="fas fa-chevron-circle-up"></i>
            </a>
        </div>

          <div class="main-menu">

          <div class="menu-link">
                <div class="menu-items">
                    <a href="/">الصفحه الرئيسيه</a>
                </div>
                <div class="menu-items">
                    <a href="/computers/">كمبيوتر ولابتوب</a>
                </div>
                <div class="menu-items">
                    <a href="/mobiles/">موبايلات</a>
                </div>
                <div class="menu-items">
                    <a href="/foods/">طعام وسوبر ماركت</a>
                </div>
                <div class="menu-items">
                    <a href="/clothes/">ملابس</a>
                </div>
                <div class="menu-items">
                    <a href="/shoes/">احذيه</a>
                </div>
                <div class="menu-items">
                    <a href="/electronics/">الكترونيات</a>
                </div>
                <div class="menu-items">
                  <a href="/car/">سيارات وماكينات</a>
              </div>
                <div class="menu-items">
                  <a href="/books/">كتب</a>
                </div>
                <div class="menu-items">
                  <a href="/toys/">العاب</a>
                </div>
                <div class="menu-items">
                  <a href="/beauty/">مستحضرات التجميل والعطور</a>
                </div>
                <div class="menu-items">
                  <a href="/accessories/">الاكسسورات</a>
                </div>
                <div class="menu-items" style="width: auto !important;">
                    <app-counter></app-counter>
                </div>

            </div>

          </div>

          <section class="social row m-auto text-center " style="background-color: #fff;">
            <div class="col-12 text-center mt-5">
              @foreach (App\social::all() as $item)
              <ul >
                <li style="display: inline-block;margin-left: 25px;">
                  <a href="{{ $item->facebook }}" target="_blank" style="font-size: 35px;color: #3b5998">
                    <i class="fab fa-facebook"></i>
                  </a>
                </li>
                <li style="display: inline-block;margin-left: 25px;">
                  <a href="{{ $item->instagrame }}" target="_blank" style="font-size: 35px;color: #bc2a8d">
                    <i class="fab fa-instagram-square"></i>
                  </a>
                </li>
                <li style="display: inline-block;margin-left: 25px;">
                  <a href="{{ $item->youtube }}" target="_blank" style="font-size: 35px;color: #c4302b">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
                <li style="display: inline-block;margin-left: 10px;">
                  <a href="{{ $item->twitter }}" target="_blank" style="font-size: 35px;color: #26a7de">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
              </ul>
              @endforeach
            </div>
          </section>

          <footer>
            كل الحقوق محفوظه لشركة فاستر للتجارة الحره &copy; 2020
          </footer>
      <script src="{{asset('scripts/jquery-3.5.1.js')}}"></script>
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
      <script src="{{asset('scripts/zoom.js')}}"></script>
        {{-- <script>


        $(function(){
            $("body").on("click","img",function(){
            var x=$(this).attr("src");
            $(".zoom").find("img").attr("src",x);
            });
            $('.zoom').zoom();

        });

        </script> --}}

        <script src="{{asset('dash/js/d3.min.js')}}"></script>
        <script src="{{asset('dash/js/getmdl-select.min.js')}}"></script>
        <script src="{{asset('dash/js/material.min.js')}}"></script>
        <script src="{{asset('dash/js/nv.d3.min.js')}}"></script>
        <script src="{{asset('dash/js/layout/layout.min.js')}}"></script>
        <script src="{{asset('dash/js/scroll/scroll.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/charts/discreteBarChart.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/charts/linePlusBarChart.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/charts/stackedBarChart.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/employer-form/employer-form.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/line-chart/line-charts-nvd3.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/map/maps.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/pie-chart/pie-charts-nvd3.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/table/table.min.js')}}"></script>
        <script src="{{asset('dash/js/widgets/todo/todo.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
        <script src="{{asset('scripts/all.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
        @if (Session::has('sender'))
        <script>
            Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary',
                },
                buttonsStyling: false
            }).fire({
                confirmButtonText: 'تابع التسوق',
                title: 'حالة الطلب',
                text: "تم ارسال الطلب بنجاح",
                icon: 'success',

            });
            setTimeout(() => {
                @php
                    Session::forget('sender');
                @endphp
            }, 2500);
        </script>
        @endif

        <script src="{{asset('scripts/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('scripts/min.js')}}"></script>
    </body>
</html>
