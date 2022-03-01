@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')


    <style>
        * {
            text-transform: capitalize
        }

    </style>

    <div class="mdl-grid mdl-grid--no-spacing dashboard">
        <div class="mdl-grid mdl-grid--no-spacing dashboard">
            <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

                <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp " style="text-align: right !important">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text" >
                                <center>
                                    مصروفات اليوم
                                </center>
                            </h2>

                            <div class="mdl-layout-spacer"></div>

                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand">
                            <p class="weather-temperature" style="font-size: 42px">
                                {{ $orderexpenses }}
                            </p>

                            <p class="weather-description">

                            </p>
                        </div>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp " style="text-align: right !important">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text" >
                                <center>
                                    مشتريات اليوم
                                </center>
                            </h2>

                            <div class="mdl-layout-spacer"></div>

                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand">
                            <p class="weather-temperature" style="font-size: 42px">
                                {{ $prushes?$prushes:'0' }}
                            </p>

                            <p class="weather-description">

                            </p>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp " style="text-align: right !important">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text" >
                                <center>
                                    مبيعات اليوم
                                </center>
                            </h2>

                            <div class="mdl-layout-spacer"></div>

                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand">
                            <p class="weather-temperature" style="font-size: 42px">
                                {{ $siles3 }}
                            </p>

                            <p class="weather-description">

                            </p>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp " style="text-align: right !important">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text" >
                                <center>
                                    مبيعات اللعب
                                </center>
                            </h2>

                            <div class="mdl-layout-spacer"></div>

                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand">
                            <p class="weather-temperature" style="font-size: 42px">
                                {{ $siles }}
                            </p>

                            <p class="weather-description">

                            </p>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp " style="text-align: right !important">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text" >
                                <center>
                                    مبيعات الطعام
                                </center>
                            </h2>

                            <div class="mdl-layout-spacer"></div>

                        </div>
                        <div class="mdl-card__supporting-text mdl-card--expand">
                            <p class="weather-temperature" style="font-size: 42px">
                                {{ $siles2 }}
                            </p>

                            <p class="weather-description">

                            </p>
                        </div>
                    </div>
                </div>
                @if (App\devices::all()->count() > 0)
                    @foreach (App\devices::all() as $item)
                        <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--2-col-phone">
                            <div class=" " style="text-align: right !important">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Room {{ $item->room_id }}</h2>

                                    <div class="mdl-layout-spacer">{{ App\orders::where('room_id',$item->id)->where('date',date('y-m-d'))->sum('fully') }}</div>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <div class="mdl-card__subtitle-text">
                                        @if ($item->active == 0)
                                            <a href="{{ route('timer.show', $item['id']) }}"
                                                style="text-transform: none;color:white;font-size: 18px">متاح اضغط للحجز </a>

                                        @else
                                            <a href="{{ route('orders.show', $item['id']) }}"
                                                style="text-transform: none;color:white;font-size: 18px">غير متاح</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="mdl-card__supporting-text mdl-card--expand" style="padding: 0 !important;width: 100%;" >
                                    <p class="weather-description">
                                        @if ($item->active == 0)
                                            <a href="{{ route('timer.show', $item['id']) }}">
                                                <img src="images/devices/{{ $item->img }}" style="width: 100%">
                                            </a>
                                        @else
                                            <a href="{{ route('orders.show', $item['id']) }}">
                                                <img src="images/devices/{{ $item->img }}" style="width: 100%">
                                            </a>
                                        @endif
                                    </p>
                                </div>
                                <div class="mdl-card__title" >
                                    @if ($item->active == 0)
                                        <a href="{{ route('timedown.index' ) }}/{{ $item['id'] }}" style="text-transform: none;color:white;font-size: 18px">متاح اضغط للحجز (وقت مظبوط)</a>
                                    @else
                                        <a href="{{ route('timer.edit', $item['id']) }}" style="text-transform: none;color:white;font-size: 18px">غير متاح</a>
                                    @endif

                                </div>
                            </div>
                        </div>


                    @endforeach
                @else
                    <div style="position: absolute;top: 60%;left:50%;transform: translate(-50%,-50%);font-size: 22px;">
                        لا توجد غرف بعد
                    </div>
                @endif

            </div>
        </div>
    </div>


@endsection
