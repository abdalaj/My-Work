@extends('layouts.app')
@section('title')
    الرسومات البيانيه للمخزن علي مدي السنه الحاليه
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        التوريدات
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="bar-chart1" style="height: 300px; padding: 0px; position: relative;">

                    </div>
                </div>
                <!-- /.card-body-->
            </div>

        </div>
        <div class="col-12">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        النشر والصرف
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="bar-chart2" style="height: 300px; padding: 0px; position: relative;">

                    </div>
                </div>
                <!-- /.card-body-->
            </div>

        </div>
        <div class="col-12">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        التحميل والتصنيع
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="bar-chart3" style="height: 300px; padding: 0px; position: relative;">

                    </div>
                </div>
                <!-- /.card-body-->
            </div>

        </div>
        <div class="col-12">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        الارباح
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="god" style="height: 300px; padding: 0px; position: relative;">

                    </div>
                </div>
                <!-- /.card-body-->
            </div>

        </div>
    </div>
@endsection
@section('header-link')
    <a href="">    الرسومات البيانيه للمخزن علي مدي السنه الحاليه</a>
@endsection
@section('header-name')
    الرسومات البيانيه للمخزن علي مدي السنه الحاليه
@endsection
@section('script')
    <script src="{{ asset('plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('plugins/flot-old/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('plugins/flot-old/jquery.flot.pie.min.js') }}"></script>
    <script>
        var bar_data1 = {

            data: [
                [1, {{ $imp_1 }}],
                [2, {{ $imp_2 }}],
                [3, {{ $imp_3 }}],
                [4, {{ $imp_4 }}],
                [5, {{ $imp_5 }}],
                [6, {{ $imp_6 }}],
                [7, {{ $imp_7 }}],
                [8, {{ $imp_8 }}],
                [9, {{ $imp_9 }}],
                [10, {{ $imp_10 }}],
                [11, {{ $imp_11 }}],
                [12, {{ $imp_12 }}],
            ],
            bars: {
                show: true
            }
        }
        $.plot('#bar-chart1', [bar_data1], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: 'right',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                ticks: [
                    [1, 'يناير'],
                    [2, 'فبراير'],
                    [3, 'مارس'],
                    [4, 'ابريل'],
                    [5, 'مايو'],
                    [6, 'يونيو'],
                    [7, 'يوليو'],
                    [8, 'اغسطس'],
                    [9, 'سبتمبر'],
                    [10, 'اكتوبر'],
                    [11, 'نوفمبر'],
                    [12, 'ديسمبر'],
                ]
            },
            yaxis: {
                show: false
            }
        })
        var bar_data2 = {

            data: [
                [1, {{ $pub_1 }}],
                [2, {{ $pub_2 }}],
                [3, {{ $pub_3 }}],
                [4, {{ $pub_4 }}],
                [5, {{ $pub_5 }}],
                [6, {{ $pub_6 }}],
                [7, {{ $pub_7 }}],
                [8, {{ $pub_8 }}],
                [9, {{ $pub_9 }}],
                [10, {{ $pub_10 }}],
                [11, {{ $pub_11 }}],
                [12, {{ $pub_12 }}],
            ],
            bars: {
                show: true
            }
        }
        $.plot('#bar-chart2', [bar_data2], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: 'right',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                ticks: [
                    [1, 'يناير'],
                    [2, 'فبراير'],
                    [3, 'مارس'],
                    [4, 'ابريل'],
                    [5, 'مايو'],
                    [6, 'يونيو'],
                    [7, 'يوليو'],
                    [8, 'اغسطس'],
                    [9, 'سبتمبر'],
                    [10, 'اكتوبر'],
                    [11, 'نوفمبر'],
                    [12, 'ديسمبر'],
                ]
            },
            yaxis: {
                show: false
            }
        })
        var bar_data3 = {

            data: [
                [1, {{ $exp_1 }}],
                [2, {{ $exp_2 }}],
                [3, {{ $exp_3 }}],
                [4, {{ $exp_4 }}],
                [5, {{ $exp_5 }}],
                [6, {{ $exp_6 }}],
                [7, {{ $exp_7 }}],
                [8, {{ $exp_8 }}],
                [9, {{ $exp_9 }}],
                [10, {{ $exp_10 }}],
                [11, {{ $exp_11 }}],
                [12, {{ $exp_12 }}],
            ],
            bars: {
                show: true
            }
        }
        $.plot('#bar-chart3', [bar_data3], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: 'right',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                ticks: [
                    [1, 'يناير'],
                    [2, 'فبراير'],
                    [3, 'مارس'],
                    [4, 'ابريل'],
                    [5, 'مايو'],
                    [6, 'يونيو'],
                    [7, 'يوليو'],
                    [8, 'اغسطس'],
                    [9, 'سبتمبر'],
                    [10, 'اكتوبر'],
                    [11, 'نوفمبر'],
                    [12, 'ديسمبر'],
                ]
            },
            yaxis: {
                show: false
            }
        })
        var god = {

            data: [
                [1, {{ $god_1 }}],
                [2, {{ $god_2 }}],
                [3, {{ $god_3 }}],
                [4, {{ $god_4 }}],
                [5, {{ $god_5 }}],
                [6, {{ $god_6 }}],
                [7, {{ $god_7 }}],
                [8, {{ $god_8 }}],
                [9, {{ $god_9 }}],
                [10, {{ $god_10 }}],
                [11, {{ $god_11 }}],
                [12, {{ $god_12 }}],
            ],
            bars: {
                show: true
            }
        }
        $.plot('#god', [god], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: 'right',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                ticks: [
                    [1, 'يناير'],
                    [2, 'فبراير'],
                    [3, 'مارس'],
                    [4, 'ابريل'],
                    [5, 'مايو'],
                    [6, 'يونيو'],
                    [7, 'يوليو'],
                    [8, 'اغسطس'],
                    [9, 'سبتمبر'],
                    [10, 'اكتوبر'],
                    [11, 'نوفمبر'],
                    [12, 'ديسمبر'],
                ]
            },
            yaxis: {
                show: false
            }
        })
    </script>
@endsection
