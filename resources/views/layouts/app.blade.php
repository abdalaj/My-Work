<!DOCTYPE html>
<html dir="{{\Session::get('locale')=='ar'?'rtl':'ltr'}}">
@include('layouts.partial.head')
@yield('style')
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('layouts.partial.header')

        @include('layouts.partial.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partial.footer')

    </div>
    @include('layouts.partial.script')

    <iframe style="display: none;height: 2480px;" name="theFrame"></iframe>
    {{--<div id="footer">
        <b>{!!$settings['Address']!!}</b>
        <br><br><span>{{$settings['mobile']}}</span>
    </div>--}}
    @yield('script')
</body>
</html>
