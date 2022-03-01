@extends('layouts.app')
@section('title')
    تفاصيل موظف
@endsection
@section('header-name')
    تفاصيل موظف
@endsection
@section('header-link')
    <a href="">تفاصيل موظف</a> / الموظفين
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">بيانات الموظف</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <style>
                    table,
                    th,
                    td {
                        border: 1px solid #000 !important
                    }

                </style>
                <div class="table-responsive">
                    <table id="" class="table table-bordered " style="width: 100% !important;">
                        <tbody>
                            @foreach ($data as $s)
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <b>
                                                بيانات الموظف رقم {{ $s->id }}
                                            </b>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>رقم الموظف</td>
                                    <td>
                                        {{ $s->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>اسم الموظف</td>
                                    <td>
                                        {{ $s->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>الوظيفه</td>
                                    <td>
                                        {{ $s->type }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>رقم الهاتف</td>
                                    <td>
                                        {{ $s->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>راتب الموظف</td>
                                    <td>
                                        {{ $s->salery }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>عدد ايام العمل</td>
                                    <td>
                                        {{ $s->days }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>اليوميه</td>
                                    <td>
                                        {{ $s->salery_days }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>تاريخ بداية العمل</td>
                                    <td>
                                        {{ $s->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>ملاحظات</td>
                                    <td>
                                        @if ($s->notes==NULL)
                                            لايوجد
                                        @else
                                            {{ $s->notes }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">المكافأت</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <style>
                    table,
                    th,
                    td {
                        border: 1px solid #000 !important
                    }

                </style>
                <div class="table-responsive">
                    <table class="table table-bordered " style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>البيان</th>
                                <th>المبلغ</th>
                                <th>مكافأة شهر</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($win as $w)
                                <tr>
                                    <td>
                                        {{ $w->id }}
                                    </td>
                                    <td>
                                        {{ $w->name }}
                                    </td>
                                    <td class="win_table">
                                        {{ $w->mony }}
                                    </td>
                                    <td>
                                        {{ explode('-',explode(' ',$w->created_at)[0])[1] }}
                                    </td>
                                    <td>
                                        {{ $w->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-danger"  >
                            <tr>
                                <td colspan="2">
                                    الاجمالي
                                </td>
                                <td class="amount_win">

                                </td>
                                <td colspan="2">

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">العقوبات</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <style>
                    table,
                    th,
                    td {
                        border: 1px solid #000 !important
                    }

                </style>
                <div class="table-responsive">
                    <table class="table table-bordered  " style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>البيان</th>
                                <th>المبلغ</th>
                                <th>عقوبة شهر</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lose as $l)
                                <tr>
                                    <td>
                                        {{ $l->id }}
                                    </td>
                                    <td>
                                        {{ $l->name }}
                                    </td>
                                    <td class="lose_table">
                                        {{ $l->mony }}
                                    </td>
                                    <td>
                                        {{ explode('-',explode(' ',$w->created_at)[0])[1] }}
                                    </td>
                                    <td>
                                        {{ $l->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-danger" >
                            <tr>
                                <td colspan="2">
                                    الاجمالي
                                </td>
                                <td class="amount_lose">

                                </td>
                                <td colspan="2">

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">المرتبات والسلف</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <style>
                    table,
                    th,
                    td {
                        border: 1px solid #000 !important
                    }

                </style>
                <div class="table-responsive">
                    <table id="" class="table table-bordered " style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>البيان</th>
                                <th>المبلغ</th>
                                <th>اسم المصروف</th>
                                <th>تم الخصم من خزنة</th>
                                <th>الشهر</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffMony as $m)
                                <tr>
                                    <td>
                                        {{ $m->id }}
                                    </td>
                                    <td>
                                        {{ $m->name }}
                                    </td>
                                    <td class="staffmony">
                                        {{ $m->mony }}
                                    </td>
                                    <td>
                                        @foreach ($prushes->where('id',$m->prushes_id) as $p)
                                            {{ $p->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($banks->where('id',$m->bank_id) as $bank)
                                            {{ $bank->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ explode('-',explode(' ',$m->created_at)[0])[1] }}
                                    </td>
                                    <td>
                                        {{ $m->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-danger">
                            <tr>
                                <td colspan="2">
                                    الاجمالي
                                </td>
                                <td colspan="1" class="amount_staffmony">

                                </td>
                                <td colspan="4">

                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function(){
        var total = 0;
        $(".win_table").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total += amount;
                $(".amount_win").text(total.toFixed(2));
            })
            var total1 = 0;
            $(".lose_table").each(function(x, y) {
                var amount1 = parseFloat($(this).text()) - 0;
                total1 += amount1;
                $(".amount_lose").text(total1.toFixed(2));
            })
            var total2 = 0;
            $(".staffmony").each(function(x, y) {
                var amount2 = parseFloat($(this).text()) - 0;
                total2 += amount2;
                $(".amount_staffmony").text(total2.toFixed(2));
            })
        })
    </script>
@endsection
