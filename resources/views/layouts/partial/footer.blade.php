<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>@lang('front.second edition')</b>
    </div>
    <strong>@lang('front.copyright') &copy; 2015 - {{ (new DateTime)->format("Y") }} <a data-toggle="modal" data-target="#myModalDeveloper" href="{{route('developer')}}">@lang('front.Designed and Developed By') {{config('developer.developer_'.App::getLocale())}} </a>.</strong>
</footer>
