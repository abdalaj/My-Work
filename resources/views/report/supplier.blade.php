@extends('layouts.app')
@section('title')
    الرسومات البيانيه للعميل رقم {{ request()->subnum }}
@endsection
@section('content')
    <form style="margin-top: 10px;margin-bottom: 10px;" class="row" action="" method="get">
        <div class="col-12 col-sm-12">
            <label>رقم العميل</label>
            <input autocomplete="off" style="direction: rtl;" name="subnum" value="{{ request()->subnum }}" type="text"
                class="form-control datepicker">
        </div>

        <div class="col-12 col-sm-12">
            <label> </label>
            <button type="submit" class="btn btn-primary form-control">بحث</button>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">الكشف التوضيحي للمخزن</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px; min-height:230px"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">الرسم الدائري للمخزن</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart" style="height:230px; min-height:230px"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('header-link')
    <a href=""> الرسومات البيانيه للعميل رقم {{ request()->subnum }}</a>
@endsection
@section('header-name')
    الرسومات البيانيه للعميل رقم {{ request()->subnum }}
@endsection
@section('script')
     <!-- FLOT CHARTS -->
     <script src="{{ asset('plugins/flot/jquery.flot.js') }}"></script>
     <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
     <script src="{{ asset('plugins/flot-old/jquery.flot.resize.min.js') }}"></script>
     <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
     <script src="{{ asset('plugins/flot-old/jquery.flot.pie.min.js') }}"></script>
     <script src="{{ asset('plugins/chart.js/Chart.bundle.min.js') }}"></script>
     <!-- Page script -->
     <script>
         $(function() {
             var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
             var donutData = {
                 labels: [
                     'التوريدات',
                     'النشر',
                     'التصنيع والتحميل',
                     'الارباح',
                 ],
                 datasets: [{
                     data: [{{ $important }}, {{ $publisher }}, {{ $exporter }}, {{ $god }}],
                     backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
                 }]
             }
             var donutOptions = {
                 maintainAspectRatio: false,
                 responsive: true,
             }
             var donutChart = new Chart(donutChartCanvas, {
                 type: 'doughnut',
                 data: donutData,
                 options: donutOptions
             })

             var areaChartData = {
                 labels: [
                     'يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر', 'نوفمبر', 'ديسمبر'
                 ],
                 datasets: [
                     {
                         label: 'التوريدات',
                         backgroundColor: '#f56954',
                         borderColor: '#f56954',
                         pointRadius: false,
                         pointColor: '#3b8bba',
                         pointStrokeColor: '#f56954',
                         pointHighlightFill: '#fff',
                         pointHighlightStroke: 'rgba(60,141,188,1)',
                         data: [{{$imp_1}}, {{$imp_2}}, {{$imp_3}}, {{$imp_4}}, {{$imp_5}}, {{$imp_6}}, {{$imp_7}},{{$imp_8}}, {{$imp_9}}, {{$imp_10}}, {{$imp_11}}, {{$imp_12}}]
                     },{
                         label: 'النشر',
                         backgroundColor: '#00a65a',
                         borderColor: '#00a65a',
                         pointRadius: false,
                         pointColor: '#00a65a',
                         pointStrokeColor: '#c1c7d1',
                         pointHighlightFill: '#fff',
                         pointHighlightStroke: 'rgba(220,220,220,1)',
                         data: [{{$pub_1}}, {{$pub_2}}, {{$pub_3}}, {{$pub_4}}, {{$pub_5}}, {{$pub_6}}, {{$pub_7}},{{$pub_8}}, {{$pub_9}}, {{$pub_10}}, {{$pub_11}}, {{$pub_12}}]
                     },{
                         label: 'التصنيع والتحميل',
                         backgroundColor: '#f39c12',
                         borderColor: '#f39c12',
                         pointRadius: false,
                         pointColor: '#f39c12',
                         pointStrokeColor: '#c1c7d1',
                         pointHighlightFill: '#fff',
                         pointHighlightStroke: 'rgba(220,220,220,1)',
                         data: [{{$exp_1}}, {{$exp_2}}, {{$exp_3}}, {{$exp_4}}, {{$exp_5}}, {{$exp_6}}, {{$exp_7}},{{$exp_8}}, {{$exp_9}}, {{$exp_10}}, {{$exp_11}}, {{$exp_12}}]
                     },{
                         label: 'الارباح',
                         backgroundColor: '#00c0ef',
                         borderColor: '#00c0ef',
                         pointRadius: false,
                         pointColor: '#00c0ef',
                         pointStrokeColor: '#c1c7d1',
                         pointHighlightFill: '#fff',
                         pointHighlightStroke: 'rgba(220,220,220,1)',
                         data: [{{$god_1}}, {{$god_2}}, {{$god_3}}, {{$god_4}}, {{$god_5}}, {{$god_6}}, {{$god_7}},{{$god_8}}, {{$god_9}}, {{$god_10}}, {{$god_11}}, {{$god_12}}]
                     },
                 ]
             }

             var areaChartOptions = {
                 maintainAspectRatio: false,
                 responsive: true,
                 legend: {
                     display: false
                 },
                 scales: {
                     xAxes: [{
                         gridLines: {
                             display: false,
                         }
                     }],
                     yAxes: [{
                         gridLines: {
                             display: false,
                         }
                     }]
                 }
             }

             var barChartCanvas = $('#barChart').get(0).getContext('2d')
             var barChartData = jQuery.extend(true, {}, areaChartData)

             var temp0 = areaChartData.datasets[0]
             var temp1 = areaChartData.datasets[1]
             var temp2 = areaChartData.datasets[2]
             var temp3 = areaChartData.datasets[3]

             barChartData.datasets[0] = temp0
             barChartData.datasets[1] = temp1
             barChartData.datasets[2] = temp2
             barChartData.datasets[3] = temp3

             var barChartOptions = {
                 responsive: true,
                 maintainAspectRatio: true,
                 datasetFill: true
             }

             var barChart = new Chart(barChartCanvas, {
                 type: 'bar',
                 data: barChartData,
                 options: barChartOptions
             })


         })
     </script>
@endsection

