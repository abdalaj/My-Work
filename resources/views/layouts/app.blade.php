<!DOCTYPE html>
<html lang="{{ \Session::get('locale') }}" dir="{{ \Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','كنوز')</title>
    <meta name="description"
        content="افضل واسرع واسهل برنامج لادارة نشاط الرخام الخاص بك دلوقت جه الوقت اللي تقدر تريح نفسك فيه ابدأ دلوقتي ومتقلش بكره هبدأ">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <meta name="msapplication-TileImage" content="{{ asset('images/touch/ms-touch-icon-144x144-precomposed.png') }}">
    <meta name="msapplication-TileColor" content="  #3372DF">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('logo.png') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/ionicons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/google.font.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/jquery.datatable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/fixedColumns.semanticui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/alertify.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/flag-icon.css') }}">
    @if (\Session::get('locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    @endif
    <style>
        table,
        th,
        td {
            border: 1px solid #000;
            width: auto !important;
            font-size: 11px;
        }

        td {
            border: 1px solid #000;
            border-top: 0;
        }

        div.dt-button-collection {
            width: 400px;
        }

        div.dt-button-collection button.dt-button {
            display: inline-block;
            width: 32%;
        }

        div.dt-button-collection button.buttons-colvis {
            display: inline-block;
            width: 49%;
        }

        div.dt-button-collection h3 {
            margin-top: 5px;
            margin-bottom: 5px;
            font-weight: 100;
            border-bottom: 1px solid #9f9f9f;
            font-size: 1em;
        }

        div.dt-button-collection h3.not-top-heading {
            margin-top: 10px;
        }

    </style>
    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed" >
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" title="لايوجد" data-widget="pushmenu" href="#"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-5">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="@lang('app.search')"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" title="بحث" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav mr-auto-navbav">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-globe"></i>
                        <span class=" badge-success navbar-badge">{{ App::getLocale() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ route('changeLang', 'ar') }}" class="dropdown-item">
                            <div class="media" style="display: flex;align-items: center">
                                <span class="flag-icon flag-icon-egy"></span>
                                <p style="margin-right: 5px">العربيه</p>
                            </div>
                        </a>
                        <a href="{{ route('changeLang', 'en') }}" class="dropdown-item">
                            <div class="media" style="display: flex;align-items: center">
                                <span class="flag-icon flag-icon-usa"></span>
                                <p style="margin-right: 5px">English</p>
                            </div>
                        </a>
                        <a href="{{ route('changeLang', 'chn') }}" class="dropdown-item">
                            <div class="media" style="display: flex;align-items: center">
                                <span class="flag-icon flag-icon-chn"></span>
                                <p style="margin-right: 5px">中國人
                                </p>
                            </div>
                        </a>
                        <a href="{{ route('changeLang', 'tur') }}" class="dropdown-item">
                            <div class="media" style="display: flex;align-items: center">
                                <span class="flag-icon flag-icon-tur"></span>
                                <p style="margin-right: 5px">Türkçe
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" title="لايوجد" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <div class="nav-link">
                        <form action="{{ route('logout') }}" method="POST"
                            style="margin: 0 !important;background: transparent !important;">
                            @csrf
                            <button type="submit" title="تسجيل الخروج"
                                style="padding: 0;border: 0;margin: 0 !important;background: transparent !important;">
                                <i class="fas fa-sign-out-alt" style="background: transparent !important;"></i>
                            </button>
                        </form>
                    </div>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="لا يوجد" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel  ">
                    <a href="#" class="brand-link">
                        <img src="{{ asset('logo.png') }}" alt="AdminLTE Logo"
                            class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light" style="font-weight: bold !important">كنوز</span>
                    </a>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false">

                        <li class="nav-item mt-3">
                            <a href="/home" class="nav-link active  ">
                                <i class="fas fa-home"></i>
                                <p>
                                    @lang('app.home')
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>

                        @if (count($roles->where('roles_id', 10)) > 0)
                            @if ($roles->where('roles_id', 10)->first()->roles_id == 10)

                                <li class="nav-item">
                                    <a href="{{ route('exporter.create') }}" target="_blank" class="nav-link">
                                        <i class="fas fa-file-export"></i>
                                        <p>
                                            نقطة بيع منفصله
                                        </p>
                                    </a>
                                </li>
                            @endif
                        @endif

                        @if (count($roles->where('roles_id', 34)) > 0)
                            @if ($roles->where('roles_id', 34)->first()->roles_id == 34)
                                <li class="nav-item">
                                    <a href="{{ route('supplier.index') }}" class="nav-link">
                                        <i class="fas fa-street-view"></i>
                                        <p>
                                            قائمة العملاء
                                        </p>
                                    </a>
                                </li>
                            @endif
                        @endif

                        @if (count($roles->where('roles_id', 1)) > 0 || count($roles->where('roles_id', 5)) > 0 || count($roles->where('roles_id', 9)) > 0 || count($roles->where('roles_id', 74)) > 0 || count($roles->where('roles_id', 79)) > 0)
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-cart-plus"></i>
                                    <p>
                                        @lang('app.point of important')
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (count($roles->where('roles_id', 1)) > 0)
                                        @if ($roles->where('roles_id', 1)->first()->roles_id == 1)
                                            <li class="nav-item">
                                                <a href="{{ route('important.index') }}" class="nav-link ">
                                                    <i class="fas fa-file-import"></i>
                                                    <p>
                                                        التوريد
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 5)) > 0)
                                        @if ($roles->where('roles_id', 5)->first()->roles_id == 5)
                                            <li class="nav-item">
                                                <a href="{{ route('publisher.index') }}" class="nav-link   ">
                                                    <i class="fas fa-upload"></i>

                                                    <p>
                                                        النشر والصرف
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 9)) > 0)
                                        @if ($roles->where('roles_id', 9)->first()->roles_id == 9)
                                            <li class="nav-item">
                                                <a href="{{ route('exporter.index') }}" class="nav-link   ">
                                                    <i class="fas fa-file-export"></i>
                                                    <p>
                                                        التحميل والتصنيع
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 74)) > 0)
                                        @if ($roles->where('roles_id', 74)->first()->roles_id == 74)
                                            <li class="nav-item">
                                                <a href="{{ route('purchases.index') }}" class="nav-link   ">
                                                    <i class="fab fa-sellcast"></i>
                                                    <p>
                                                        المشتريات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 79)) > 0)
                                        @if ($roles->where('roles_id', 79)->first()->roles_id == 79)
                                            <li class="nav-item">
                                                <a href="{{ route('expire.index') }}" class="nav-link   ">
                                                    <i class="fa fa-trash"></i>
                                                    <p>
                                                        الهالكات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 83)) > 0)
                                        @if ($roles->where('roles_id', 83)->first()->roles_id == 83)
                                            <li class="nav-item">
                                                <a href="{{ route('return.index') }}" class="nav-link   ">
                                                    <i class="fas fa-undo"></i>
                                                    <p>
                                                        المرتجعات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (count($roles->where('roles_id', 13)) > 0 || count($roles->where('roles_id', 17)) > 0 || count($roles->where('roles_id', 21)) > 0 || count($roles->where('roles_id', 25)) > 0 || count($roles->where('roles_id', 30)) > 0)
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-money-bill-alt"></i>
                                    <p>
                                        الماليه والمخازن
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (count($roles->where('roles_id', 13)) > 0)
                                        @if ($roles->where('roles_id', 13)->first()->roles_id == 13)
                                            <li class="nav-item">
                                                <a href="{{ route('prushes.index') }}" class="nav-link   ">
                                                    <i class="fas fa-golf-ball"></i>
                                                    <p>
                                                        المصروفات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 17)) > 0)
                                        @if ($roles->where('roles_id', 17)->first()->roles_id == 17)
                                            <li class="nav-item">
                                                <a href="{{ route('expenses.index') }}" class="nav-link   ">
                                                    <i class="fas fa-moon"></i>
                                                    <p>
                                                        تفاصيل المصروفات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 21)) > 0)
                                        @if ($roles->where('roles_id', 21)->first()->roles_id == 21)
                                            <li class="nav-item">
                                                <a href="{{ route('store.index') }}" class="nav-link   ">
                                                    <i class="fas fa-store"></i>
                                                    <p>
                                                        المخازن
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 25)) > 0)
                                        @if ($roles->where('roles_id', 25)->first()->roles_id == 25)
                                            <li class="nav-item">
                                                <a href="{{ route('bank.index') }}" class="nav-link   ">
                                                    <i class="fas fa-money-bill"></i>
                                                    <p>
                                                        الخزنه
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 30)) > 0)
                                        @if ($roles->where('roles_id', 30)->first()->roles_id == 30)
                                            <li class="nav-item">
                                                <a href="{{ route('currencies.index') }}" class="nav-link   ">

                                                    <i class="fas fa-money-check-alt"></i>
                                                    <p>
                                                        العملات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (count($roles->where('roles_id', 34)) > 0 || count($roles->where('roles_id', 40)) > 0 || count($roles->where('roles_id', 47)) > 0 || count($roles->where('roles_id', 52)) > 0)
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-user-cog"></i>
                                    <p>
                                        الاشخاص
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (count($roles->where('roles_id', 34)) > 0)
                                        @if ($roles->where('roles_id', 34)->first()->roles_id == 34)
                                            <li class="nav-item">
                                                <a href="{{ route('supplier.index') }}" class="nav-link   ">
                                                    <i class="fas fa-street-view"></i>
                                                    <p>
                                                        العملاء
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 40)) > 0)
                                        @if ($roles->where('roles_id', 40)->first()->roles_id == 40)
                                            <li class="nav-item">
                                                <a href="{{ route('staff.index') }}" class="nav-link   ">
                                                    <i class="fas fa-star"></i>
                                                    <p>
                                                        الموظفين
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 47)) > 0)
                                        @if ($roles->where('roles_id', 47)->first()->roles_id == 47)
                                            <li class="nav-item">
                                                <a href="{{ route('shorka.index') }}" class="nav-link   ">
                                                    <i class="fab fa-ubuntu"></i>
                                                    <p>
                                                        الشركاء
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 52)) > 0)
                                        @if ($roles->where('roles_id', 52)->first()->roles_id == 52)
                                            <li class="nav-item">
                                                <a href="{{ route('users.index') }}" class="nav-link   ">
                                                    <i class="fas fa-users"></i>
                                                    <p>
                                                        المستخدمين
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (count($roles->where('roles_id', 57)) > 0 || count($roles->where('roles_id', 60)) > 0 || count($roles->where('roles_id', 61)) > 0 || count($roles->where('roles_id', 62)) > 0 || count($roles->where('roles_id', 63)) > 0 || count($roles->where('roles_id', 73)) > 0)
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-file"></i>
                                    <p>
                                        التقارير
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (count($roles->where('roles_id', 57)) > 0)
                                        @if ($roles->where('roles_id', 57)->first()->roles_id == 57)
                                            <li class="nav-item">
                                                <a href="{{ route('orders.index') }}" class="nav-link   ">
                                                    <i class="fas fa-poll"></i>
                                                    <p>
                                                        الفواتير
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 64)) > 0)
                                        @if ($roles->where('roles_id', 64)->first()->roles_id == 64)
                                            <li class="nav-item">
                                                <a href="{{ route('collection.index') }}" class="nav-link   ">
                                                    <i class="fas fa-clipboard-list"></i>
                                                    <p>
                                                        الكشف الشامل للمخزن
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 60)) > 0)
                                        @if ($roles->where('roles_id', 60)->first()->roles_id == 60)
                                            <li class="nav-item">
                                                <a href="{{ route('getmony.index') }}" class="nav-link   ">
                                                    <i class="fas fa-clipboard-check"></i>
                                                    <p>
                                                        التحصيلات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 61)) > 0)
                                        @if ($roles->where('roles_id', 61)->first()->roles_id == 61)
                                            <li class="nav-item">
                                                <a href="{{ route('banktransaction.index') }}"
                                                    class="nav-link   ">
                                                    <i class="fas fa-undo-alt"></i>
                                                    <p>
                                                        الايداعات والمسحوبات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 62)) > 0)
                                        @if ($roles->where('roles_id', 62)->first()->roles_id == 62)
                                            <li class="nav-item">
                                                <a href="/shorkareport" class="nav-link   ">
                                                    <i class="fab fa-fedora"></i>
                                                    <p>
                                                        الشركاء
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 73)) > 0)
                                        @if ($roles->where('roles_id', 73)->first()->roles_id == 73)
                                            <li class="nav-item">
                                                <a href="/todayreport" class="nav-link">
                                                    <i class="fab fa-algolia"></i>
                                                    <p>
                                                        حركات اليوم
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 63)) > 0)
                                        @if ($roles->where('roles_id', 63)->first()->roles_id == 63)
                                            <li class="nav-item">
                                                <a href="{{ route('logs.index') }}" class="nav-link">
                                                    <i class="fab fa-joomla"></i>
                                                    <p>
                                                        سجل النشاطات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (count($roles->where('roles_id', 64)) > 0 || count($roles->where('roles_id', 65)) > 0 || count($roles->where('roles_id', 66)) > 0 || count($roles->where('roles_id', 67)) > 0)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-chart-area"></i>
                                    <p>
                                        تقارير بيانيه
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (count($roles->where('roles_id', 64)) > 0)
                                        @if ($roles->where('roles_id', 64)->first()->roles_id == 64)
                                            <li class="nav-item">
                                                <a href="{{ route('reports.index') }} " class="nav-link">
                                                    <i class="fas fa-chart-area"></i>
                                                    <p>
                                                        المخططات التفاعليه للمخزن
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 65)) > 0)
                                        @if ($roles->where('roles_id', 65)->first()->roles_id == 65)
                                            <li class="nav-item">
                                                <a href="{{ route('reports.show', 'area') }} "
                                                    class="nav-link">
                                                    <i class="fas fa-sort-numeric-up-alt"></i>
                                                    <p>
                                                        الرسم البياني للمخزن
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 66)) > 0)
                                        @if ($roles->where('roles_id', 66)->first()->roles_id == 66)
                                            <li class="nav-item">
                                                <a href="{{ route('reports.edit', '0') }} " class="nav-link">
                                                    <i class="fas fa-circle-notch"></i>
                                                    <p>
                                                        الكشوفات المبسطه
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 67)) > 0)
                                        @if ($roles->where('roles_id', 67)->first()->roles_id == 67)
                                            <li class="nav-item">
                                                <a href="{{ route('reports.create') }} " class="nav-link">
                                                    <i class="fas fa-street-view"></i>
                                                    <p>
                                                        العملاء
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (count($roles->where('roles_id', 68)) > 0 || count($roles->where('roles_id', 69)) > 0 || count($roles->where('roles_id', 70)) > 0 || count($roles->where('roles_id', 71)) > 0 || count($roles->where('roles_id', 72)) > 0)
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tools"></i>
                                    <p>
                                        الاعدادات
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (count($roles->where('roles_id', 68)) > 0)
                                        @if ($roles->where('roles_id', 68)->first()->roles_id == 68)
                                            <li class="nav-item">
                                                <a href="{{ route('backup') }}" class="nav-link   ">
                                                    <i class="fas fa-copy"></i>
                                                    <p>
                                                        نسخ احتياطي للبيانات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 69)) > 0)
                                        @if ($roles->where('roles_id', 69)->first()->roles_id == 69)

                                            <li class="nav-item">
                                                <a href="/restore" class="nav-link   ">
                                                    <i class="fas fa-trash-restore"></i>
                                                    <p>
                                                        استرجاع البيانات
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 70)) > 0)
                                        @if ($roles->where('roles_id', 70)->first()->roles_id == 70)

                                            <li class="nav-item">
                                                <a href="/deleteall" class="nav-link   ">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <p>
                                                        حذف الداتا بيز
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 71)) > 0)
                                        @if ($roles->where('roles_id', 71)->first()->roles_id == 71)

                                            <li class="nav-item">
                                                <a href="/restall" class="nav-link   ">
                                                    <i class="fas fa-undo-alt"></i>
                                                    <p>
                                                        اعادة ضبط المصنع
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 72)) > 0)
                                        @if ($roles->where('roles_id', 72)->first()->roles_id == 72)
                                            <li class="nav-item">
                                                <a href="/clearcash" class="nav-link   ">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                    <p>
                                                        مسح الكاش
                                                    </p>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <div class="content-header" style="">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('header-name')
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">@yield('header-link')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <span style="font-weight: bold">كل الحقوق محفوظه &copy; 2021-{{ (new DateTime())->format('Y') }} <a
                    href="http://adminlte.io">كنوز</a></span>

            <div class="float-right d-none d-sm-inline-block">
                الاصدار<b>الاول</b>
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('dist/js/bootstrab.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('plugins/sparklines/sparkline.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.world.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/datatable.min.js') }}"></script>
    <script src="{{ asset('dist/js/datatable.button.js') }}"></script>
    <script src="{{ asset('dist/js/jszip.min.js') }}"></script>
    <script src="{{ asset('dist/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dist/js/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('dist/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dist/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dist/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dist/js/fixedColumns.semanticui.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dist/js/alertify.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('front/bower_components/jquery-ui/ui/minified/i18n/datepicker-ar.min.js') }}"></script>
    <script src="{{ asset('front/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('front/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scroller: true,
                "dom": 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [{
                    extend: 'collection',
                    text: "عمليات",
                    className: 'custom-html-collection',
                    buttons: [
                        '<h3>تصدير</h3>',
                        'pdf',
                        'csv',
                        'excel',
                        'copyHtml5',
                        'print',
                        '<h3 class="not-top-heading">الاعمده المرئيه</h3>',
                        'colvis',
                        "pageLength",
                    ]
                }],
                "language": {
                    "info": "انته تري من _START_ الي _END_ المجموع _TOTAL_ ",
                    "lengthMenu": "Display _MENU_ records per page",
                    "zeroRecords": "لا توجد بيانات",
                    "infoEmpty": "لا توجد بيانات بعد",
                    "infoFiltered": "(البحث من _MAX_ مجموع الصفوف)",
                    "search":"ابحث : ",
                    "paginate": {
                        "previous": "  السابق",
                        "next": " التالي",
                    }
                }
            });

            $('.select2').select2({
                theme: 'bootstrap4',
                dir: "ltr",
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });
        });
        //Swall
        $(function() {
            @if (Session::has('add'))
                {
                Swal.fire({
                title: "تم الانشاء "+ "@yield('opration')" +" بنجاح ",
                type: "success",
                icon:"success",
                confirmButtonColor: "#28a745",
                confirmButtonText: "تم",
                });
                {{ Session::forget('add') }}
                }
            @endif
            @if (Session::has('edit'))
                {
                Swal.fire({
                title: "تم التعديل "+ "@yield('opration')" +" بنجاح ",
                type: "success",
                icon:"success",
                confirmButtonColor: "#28a745",
                confirmButtonText: "تم",
                })
                {{ Session::forget('edit') }}
                }
            @endif
            @if (Session::has('null'))
                {
                Swal.fire({
                title: "لا يمكن اضافة حقول فارغه !",
                type: "warning",
                icon:"warning",
                confirmButtonColor: "#ffc107",
                confirmButtonText: "تم",
                })
                {{ Session::forget('null') }}
                }
            @endif
            @if (Session::has('backup'))
                {
                Swal.fire({
                title: "تم انشاء النسخه الاحتياطيه بنجاح ",
                type: "success",
                icon:"success",
                confirmButtonColor: "#28a745",
                confirmButtonText: "تم",
                });
                {{ Session::forget('backup') }}
                }
            @endif
            @if (Session::has('restore'))
                {
                Swal.fire({
                title: "تم استرجاع البيانات بنجاح ",
                type: "success",
                icon:"success",
                confirmButtonColor: "#28a745",
                confirmButtonText: "تم",
                });
                {{ Session::forget('restore') }}
                }
            @endif
            @if (Session::has('clearcash'))
                {
                Swal.fire({
                title: "تم حذف الكاش بنجاح ",
                type: "success",
                icon:"success",
                confirmButtonColor: "#28a745",
                confirmButtonText: "تم",
                });
                {{ Session::forget('clearcash') }}
                }
            @endif
            @if (Session::has('restall'))
                {
                Swal.fire({
                title: "تم حذف كل البيانات بنجاح ",
                type: "success",
                icon:"success",
                confirmButtonColor: "#28a745",
                confirmButtonText: "تم",
                });
                {{ Session::forget('restall') }}
                }
            @endif
        })
    </script>
    <script>
        $(function() {
            $("form .delete").click(function(e) {
                e.preventDefault();
                var url = $(this).parent().attr("action");
                // console.log(url);
                Swal.fire({
                    title: "هل انت متاكد من حذف هذا العنصر ",
                    text: "من الافضل لك ان تراجع نفسك",
                    type: "error",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#DD4140",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    cancelButtonText: "إلغاء",
                    confirmButtonText: "نعم متأكد",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                                title: 'تم الحذف!',
                                text: 'تمت عملية الحذف بنجاح',
                                icon: 'success',
                                confirmButtonColor: "#28a745",
                            }

                        ).then((re) => {
                            if (re.isConfirmed) {
                                $(this).parent().submit();
                            }
                        })
                    }
                });
            })
        })
    </script>
    <script>
        $(function() {
            $("nav ul li a").click(function() {
                $(this).addClass("active").parent().siblings().find("a").removeClass("active");
            });
            // $("nav ul li ul li a").click(function(){
            //   $(this).addClass("active").parent().siblings().find("a").removeClass("active");
            // });
        })
    </script>
    @yield('script')

</body>

{{-- $s->created_at->diffForHumans() --}}

</html>
