@extends('layouts.app')
@section('header-name')
    حركات اليوم
@endsection
@section('header-link')
    <a href="">حركات اليوم</a>
@endsection
@section('content')
<div class="row">
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">الورادات</span>
                <span
                    class="info-box-number">{{ $importantToDay[0]->importantToDay == null ? 0 : $importantToDay[0]->importantToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">النشر</span>
                <span
                    class="info-box-number">{{ $publisherToDay[0]->publisherToDay == null ? 0 : $publisherToDay[0]->publisherToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">الصادرات والتصنيع</span>
                <span
                    class="info-box-number">{{ $exporterToDay[0]->exporterToDay == null ? 0 : $exporterToDay[0]->exporterToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">المصاريف</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-dark "  >
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-dark "  >
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-dark "  >
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-dark "  >
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-secondary "  >
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-secondary "  >
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-secondary "  >
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-secondary "  >
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class=" col-md-3 col-sm-6 col-12 ">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">عدد فواتير اليوم</span>
                <span
                    class="info-box-number">{{ $ordersToDay[0]->ordersToDay == null ? 0 : $ordersToDay[0]->ordersToDay }}</span>

                <div class="progress">
                    <div class="progress-bar" style=""></div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
@endsection
