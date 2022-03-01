@extends('layouts.app')
@section('title')
    المرتجعات
@endsection
@section('header-name')
    المرتجعات
@endsection
@section('header-link')
    <a href="{{ route('return.index') }}">فاتورة رقم {{ request()->invoice_number }} </a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <div class="row">
        <div class="col-12">
            <form action="" method="GET">
                <div class="form-group col-md-12 col-sm-12 col-md-12 col-sm-12">
                    <label class="control-label"> رقم الفاتورة</label>
                    <input type="text" name="invoice_number" class="form-control invoice_number"
                        value="{{ request()->invoice_number }}" placeholder="رقم الفاتورة">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 " type="submit">
                        بحث عن الفاتوره
                    </button>
                </div>
            </form>

        </div>
    </div>
    @if (isset($orders->invoice_type))
        @if ($orders->invoice_type == 'توريد')
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card ">
                        <div class="p-4">
                            <div class="card-body " style="width:100%;overflow-x: auto">
                                <table class="table table-border">
                                    <thead>
                                        <tr style="color:white">

                                            <th style="background: rgb(99, 37, 35);" colspan="18">
                                                <center>
                                                    <h5>مرتجع توريد</h5>
                                                </center>
                                            </th>

                                        </tr>
                                        <tr>
                                            <th>رقم الاذن</th>
                                            <th>الررقم الحرفي</th>
                                            <th>رقم المصنع</th>
                                            <th>اسم الخامه</th>
                                            <th>رقم العميل </th>
                                            <th>تاريخ التوريد</th>
                                            <th>اسم العميل</th>
                                            <th>عدد البلوكات</th>
                                            <th>طول</th>
                                            <th>عرض</th>
                                            <th>ارتفاع</th>
                                            <th>صافي م3</th>
                                            <th>نسبة الخصم</th>
                                            <th>الصافي بعد الخصم</th>
                                            <th>سعر المتر</th>
                                            <th>التكلفه</th>
                                            <th>اسم المخزن</th>
                                            <th>مرتجع</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($important as $s)
                                            @if ($s->is_return == 0)
                                                <tr>
                                                    <td>
                                                        {{ $s->id }}
                                                    </td>
                                                    <td>
                                                        {{ $s->number_herfy }}
                                                    </td>
                                                    <td>
                                                        {{ $s->number_factory }}
                                                    </td>
                                                    <td>
                                                        {{ $s->name }}
                                                    </td>
                                                    <td>
                                                        {{ $s->name_client }}
                                                    </td>
                                                    <td>
                                                        {{ $s->date }}
                                                    </td>
                                                    <td>
                                                        @if (count($supplier->where('id', $s->name_client)) == 0)
                                                            <span style="color: white;width: ;" class="btn btn-danger">
                                                                لا يوجد
                                                            </span>
                                                        @else
                                                            @foreach ($supplier->where('id', $s->name_client) as $sup)
                                                                {{ $sup->name }}
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $s->qty }}
                                                    </td>
                                                    <td>
                                                        {{ $s->height }}
                                                    </td>
                                                    <td>
                                                        {{ $s->width }}
                                                    </td>
                                                    <td>
                                                        {{ $s->volum }}
                                                    </td>
                                                    <td>
                                                        {{ $s->safy }}
                                                    </td>
                                                    <td>
                                                        {{ $s->discount }}
                                                    </td>
                                                    <td>
                                                        {{ $s->safy_after }}
                                                    </td>
                                                    <td>
                                                        {{ $s->price }}
                                                    </td>
                                                    <td>
                                                        {{ $s->amount }}
                                                    </td>
                                                    <td>
                                                        @if (count($store) == 0)
                                                            <span style="color: white;width: ;" class="btn btn-danger">
                                                                لا يوجد
                                                            </span>
                                                        @else
                                                            {{ $store->find($s->store_id)->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="/return/important/{{ $s->id }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-dark "
                                                                style="color:white">مرتجع</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($orders->invoice_type == 'تحميل')
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="p-4">
                            <div class="card-body " style="width:100%;overflow-x: auto">
                                <table class="table table-border" style="width:100%;overflow-x: auto">
                                    <thead>
                                        <tr>
                                            <th style="background: rgb(255, 180, 10);color: white" colspan="25">
                                                <center>
                                                    <h5>مرتجع تحميل وتصنيع</h5>
                                                </center>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th> رقم البيان </th>
                                            <th>البيان</th>
                                            <th>اسم العميل</th>
                                            <th>تاريخ التصنيع</th>
                                            <th>كود الطلبيه</th>
                                            <th>الوصف</th>
                                            <th>العدد</th>
                                            <th>طول</th>
                                            <th>ارتفاع</th>
                                            <th>صافي م2</th>
                                            <th>سعر البيع</th>
                                            <th>التكلفه</th>
                                            <th>عدد طاولات الرفض</th>
                                            <th>اجمالي كميه الرفض</th>
                                            <th>اجمالي قيمة الرفض</th>
                                            <th>المتبقي من الطاولات</th>
                                            <th>اجمالي الكميه المتبقيه</th>
                                            <th>اجمالي قيمة المتبقي</th>
                                            <th>الفرق بين الشراء والنشر قبل الخصم م3</th>
                                            <th>الفرق بين الشراء والنشر بعد الخصم م3</th>
                                            <th>الفرق بين النشر والتصنيع / التحميل م2</th>
                                            <th>صافي ربح البلوك</th>
                                            <th>رقم الحاويه</th>
                                            <th>اسم المخزن</th>
                                            <th>مرتجع</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exporter as $s)
                                            @if ($s->is_return == 0)
                                                <tr>
                                                    <td>
                                                        {{ $s->id }}
                                                    </td>
                                                    <td>
                                                        {{ $s->name }}
                                                    </td>
                                                    <td>
                                                        {{ $s->name_client }}
                                                    </td>
                                                    <td>
                                                        {{ $s->date }}
                                                    </td>
                                                    <td>
                                                        {{ $s->code }}
                                                    </td>
                                                    <td>
                                                        {{ $s->describ }}
                                                    </td>
                                                    <td>
                                                        {{ $s->qty }}
                                                    </td>
                                                    <td>
                                                        {{ $s->height }}
                                                    </td>

                                                    <td>
                                                        {{ $s->volum }}
                                                    </td>
                                                    <td>
                                                        {{ $s->safym2 }}
                                                    </td>
                                                    <td>
                                                        {{ $s->price }}
                                                    </td>
                                                    <td>
                                                        {{ $s->amount }}
                                                    </td>
                                                    <td>
                                                        {{ $s->qty_refuse }}
                                                    </td>
                                                    <td>
                                                        {{ $s->allqty_refuse }}
                                                    </td>

                                                    <td>
                                                        {{ $s->amount_refuse }}
                                                    </td>
                                                    <td>
                                                        {{ $s->qty_found }}
                                                    </td>
                                                    <td>
                                                        {{ $s->qtyall_found }}
                                                    </td>
                                                    <td>
                                                        {{ $s->amount_found }}
                                                    </td>
                                                    <td>
                                                        {{ $s->import_miuns_publish_befor_discount }}
                                                    </td>
                                                    <td>
                                                        {{ $s->import_miuns_publish_after_discount }}
                                                    </td>
                                                    <td>
                                                        {{ $s->import_miuns_export }}
                                                    </td>
                                                    <td>
                                                        {{ $s->god }}
                                                    </td>
                                                    <td>
                                                        {{ $s->number_hawya }}
                                                    </td>

                                                    <td>
                                                        @if (count($store) == 0)
                                                            <span style="color: white;width: ;" class="btn btn-danger">
                                                                لا يوجد
                                                            </span>
                                                        @else
                                                            {{ $store->find($s->store_id)->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="/return/exporter/{{ $s->id }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-dark "
                                                                style="color:white">مرتجع</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($orders->invoice_type == 'مشتريات')
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="p-4">
                            <div class="card-body " style="width: 100% !important;">
                                <style>
                                    table,
                                    th,
                                    td {
                                        border: 1px solid #000 !important
                                    }

                                </style>
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-border" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>البيان</th>
                                                <th>الكميه</th>
                                                <th>السعر</th>
                                                <th>الاجمالي</th>
                                                <th>الوصف</th>
                                                <th>التاريخ</th>
                                                <th>مرتجع</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($purchases as $s)
                                                @if ($s->is_return == 0)
                                                    <tr>
                                                        <td>
                                                            {{ $s->id }}
                                                        </td>
                                                        <td>
                                                            {{ $s->name }}
                                                        </td>
                                                        <td>
                                                            {{ $s->qty }}
                                                        </td>
                                                        <td>
                                                            {{ $s->price }}
                                                        </td>
                                                        <td>
                                                            {{ $s->price * $s->qty }}
                                                        </td>
                                                        <td>
                                                            {{ $s->describe }}
                                                        </td>
                                                        <td>
                                                            {{ $s->date }}
                                                        </td>
                                                        <td>
                                                            <form action="/return/purchases/{{ $s->id }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-dark "
                                                                    style="color:white">مرتجع</button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection
