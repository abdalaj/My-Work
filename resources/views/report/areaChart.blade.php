@extends('layouts.app')
@section('title')
المخططات التفاعليه للمخزن علي مدي الشهر الحالي
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    التوريدات
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group" id="realtime1" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-primary btn-sm active" data-toggle="on">تشغيل</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="off">ايقاف</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="interactive1" style="height: 300px;"></div>
            </div>
            <!-- /.card-body-->
        </div>
        <!-- /.card -->

    </div>
    <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    النشر والصرف
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                    class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group" id="realtime2" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-primary btn-sm active" data-toggle="on">تشغيل</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="off">ايقاف</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="interactive2" style="height: 300px;"></div>
            </div>
            <!-- /.card-body-->
        </div>
        <!-- /.card -->

    </div>
    <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    التصنيع والتحميل
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                    class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group" id="realtime3" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-primary btn-sm active" data-toggle="on">تشغيل</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="off">ايقاف</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="interactive3" style="height: 300px;"></div>
            </div>
            <!-- /.card-body-->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col -->

    <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    الارباح
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                    class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group" id="realtimegod" data-toggle="btn-toggle">
                        <button type="button" class="btn btn-primary btn-sm active" data-toggle="on">تشغيل</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="off">ايقاف</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="god" style="height: 300px;"></div>
            </div>
            <!-- /.card-body-->
        </div>
        <!-- /.card -->

    </div>
</div>
@endsection
@section('header-link')
<a href="">المخططات التفاعليه للمخزن علي مدي الشهر الحالي</a>
@endsection
@section('header-name')
المخططات التفاعليه للمخزن علي مدي الشهر الحالي
@endsection
@section('script')
    <!-- FLOT CHARTS -->
    <script src="{{ asset('plugins/flot/jquery.flot.js') }}"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{ asset('plugins/flot-old/jquery.flot.resize.min.js') }}"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="{{ asset('plugins/flot-old/jquery.flot.pie.min.js') }}"></script>
    <!-- Page script -->
    <script>
        $(function() {

          //#region IMPORATNT
            var data1 = [],
                    totalPoints1 = parseInt("{{ $important->count() }}") - 1;

                function getRandomData1() {
                    if (data1.length > 0) {
                        data1 = data1.slice(1);
                    }

                    // Do a random walk
                    while (data1.length <= totalPoints1) {
                        @foreach ($important as $imp)
                            data1.push("{{ $imp->amount }}");
                        @endforeach
                    }

                    // Zip the generated y values with the x values
                    var res = []
                    for (var i = 0; i < data1.length; ++i) {
                        res.push([i, data1[i]])
                    }

                    return res
                }

                var interactive_plot1 = $.plot('#interactive1', [{
                    data: getRandomData1(),
                }], {
                    grid: {
                        borderColor: '#f3f3f3',
                        borderWidth: 1,
                        tickColor: '#f3f3f3'
                    },
                    series: {
                        color: '#3c8dbc',
                        lines: {
                            lineWidth: 2,
                            show: true,
                            fill: true,
                        },
                    },
                    yaxis: {
                        min: 0,
                        max: 100,
                        show: false
                    },
                    xaxis: {
                        show: false,

                    }
                })

                var updateInterval1 = 1000
                var realtime1 = 'on'

                function update1() {

                    interactive_plot1.setData([getRandomData1()])

                    // Since the axes don't change, we don't need to call plot.setupGrid()
                    interactive_plot1.draw()
                    if (realtime1 === 'on') {
                        setTimeout(update1, updateInterval1)
                    }
                }

                if (realtime1 === 'on') {
                    update1()
                }
                $('#realtime1 .btn').click(function() {
                    if ($(this).data('toggle') === 'on') {
                        realtime1 = 'on'
                    } else {
                        realtime1 = 'off'
                    }
                    update1()
                })
          //#endregion

          //#region PUBLISHER
              var data2 = [],
                  totalPoints2 = parseInt("{{ $publisher->count() }}") - 1;

              function getRandomData2() {
                  if (data2.length > 0) {
                      data2 = data2.slice(1);
                  }

                  // Do a random walk
                  while (data2.length <= totalPoints2) {
                      @foreach ($publisher as $pub)
                          data2.push("{{ $pub->amount }}");
                      @endforeach
                  }

                  // Zip the generated y values with the x values
                  var res = []
                  for (var i = 0; i < data2.length; ++i) {
                      res.push([i, data2[i]])
                  }

                  return res
              }

              var interactive_plot2 = $.plot('#interactive2', [{
                  data: getRandomData2(),
              }], {
                  grid: {
                      borderColor: '#f3f3f3',
                      borderWidth: 1,
                      tickColor: '#f3f3f3'
                  },
                  series: {
                      color: '#3c8dbc',
                      lines: {
                          lineWidth: 2,
                          show: true,
                          fill: true,
                      },
                  },
                  yaxis: {
                      min: 0,
                      max: 100,
                      show: false
                  },
                  xaxis: {
                      show: false,

                  }
              })

              var updateInterval2 = 1000
              var realtime2 = 'on'

              function update2() {

                  interactive_plot2.setData([getRandomData2()])

                  // Since the axes don't change, we don't need to call plot.setupGrid()
                  interactive_plot2.draw()
                  if (realtime2 === 'on') {
                      setTimeout(update2, updateInterval2)
                  }
              }

              if (realtime2 === 'on') {
                  update2()
              }
              $('#realtime2 .btn').click(function() {
                  if ($(this).data('toggle') === 'on') {
                      realtime2 = 'on'
                  } else {
                      realtime2 = 'off'
                  }
                  update2()
              })
          //#endregion

          //#region EXPORTER
              var data3 = [],
                  totalPoints3 = parseInt("{{ $exporter->count() }}") - 1;

              function getRandomData3() {
                  if (data3.length > 0) {
                      data3 = data3.slice(1);
                  }

                  // Do a random walk
                  while (data3.length <= totalPoints3) {
                      @foreach ($exporter as $exp)
                          data3.push("{{ $exp->amount }}");
                      @endforeach
                  }

                  // Zip the generated y values with the x values
                  var res = []
                  for (var i = 0; i < data3.length; ++i) {
                      res.push([i, data3[i]])
                  }

                  return res
              }

              var interactive_plot3 = $.plot('#interactive3', [{
                  data: getRandomData3(),
              }], {
                  grid: {
                      borderColor: '#f3f3f3',
                      borderWidth: 1,
                      tickColor: '#f3f3f3'
                  },
                  series: {
                      color: '#3c8dbc',
                      lines: {
                          lineWidth: 2,
                          show: true,
                          fill: true,
                      },
                  },
                  yaxis: {
                      min: 0,
                      max: 100,
                      show: false
                  },
                  xaxis: {
                      show: false,

                  }
              })

              var updateInterval3 = 1000
              var realtime3 = 'on'

              function update3() {

                  interactive_plot3.setData([getRandomData3()])

                  // Since the axes don't change, we don't need to call plot.setupGrid()
                  interactive_plot3.draw()
                  if (realtime3 === 'on') {
                      setTimeout(update3, updateInterval3)
                  }
              }

              if (realtime3 === 'on') {
                  update3()
              }
              $('#realtime3 .btn').click(function() {
                  if ($(this).data('toggle') === 'on') {
                      realtime3 = 'on'
                  } else {
                      realtime3 = 'off'
                  }
                  update3()
              })
          //#endregion

          //#region God
              var god = [],
              totalPointsgod = parseInt("{{ $exporter->count() }}") - 1;

              function fun_god() {
                  if (god.length > 0) {
                    god = god.slice(1);
                  }

                  // Do a random walk
                  while (god.length <= totalPointsgod) {
                      @foreach ($exporter as $exp)
                        god.push("{{ $exp->god }}");
                      @endforeach
                  }

                  // Zip the generated y values with the x values
                  var res = []
                  for (var i = 0; i < god.length; ++i) {
                      res.push([i, god[i]])
                  }

                  return res
              }

              var interactive_plot_god = $.plot('#god', [{
                  data: fun_god(),
              }], {
                  grid: {
                      borderColor: '#f3f3f3',
                      borderWidth: 1,
                      tickColor: '#f3f3f3'
                  },
                  series: {
                      color: '#3c8dbc',
                      lines: {
                          lineWidth: 2,
                          show: true,
                          fill: true,
                      },
                  },
                  yaxis: {
                      min: 0,
                      max: 100,
                      show: false
                  },
                  xaxis: {
                      show: false,

                  }
              })

              var updateIntervalgod = 1000
              var realtimegod = 'on'

              function updategod() {

                interactive_plot_god.setData([fun_god()])

                  // Since the axes don't change, we don't need to call plot.setupGrid()
                  interactive_plot_god.draw()
                  if (realtimegod === 'on') {
                      setTimeout(updategod, updateIntervalgod)
                  }
              }

              if (realtimegod === 'on') {
                  updategod()
              }
              $('#realtimegod .btn').click(function() {
                  if ($(this).data('toggle') === 'on') {
                    realtimegod = 'on'
                  } else {
                    realtimegod = 'off'
                  }
                  updategod()
              })
          //#endregion

        })
    </script>
@endsection
