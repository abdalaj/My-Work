@extends('layouts.app')
@section('title')
    كشف حساب لعميل
@endsection
@section('header-link')
    <a href="">انشاء كشف حساب لعميل </a> / كشف حساب
@endsection
@section('header-name')
    كشف حساب لعميل
@endsection
@section('content')
    <style>
        .card-body {
            overflow-x: auto !important;
        }

    </style>
    <form style="margin-top: 10px;margin-bottom: 10px;" class="row" action="" method="get">
        <div class="col-4 col-sm-6">
            <label>من</label>
            <input autocomplete="off" style="direction: rtl;" name="fromdate" value="{{ request()->fromdate }}" type="text"
                class="form-control datepicker">
        </div>
        <div class="col-4 col-sm-6">
            <label>الي</label>
            <input autocomplete="off" style="direction: rtl;" name="todate" value="{{ request()->todate }}" type="text"
                class="form-control datepicker">
        </div>
        <div class="col-4 col-sm-12">
            <label> </label>
            <button type="submit" class="btn btn-primary form-control">بحث</button>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">الفواتير</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">

                    <div class="card-body">
                        <table class="display example " style="width:100%;overflow-x: auto">
                            <thead>
                                <tr>
                                    <th class="bg-danger" colspan="13">
                                        <center>
                                            <h5>بيانات الفواتير</h5>
                                        </center>
                                    </th>
                                </tr>
                                <tr>
                                    <th> رقم الفاتورة </th>
                                    <th>نوع الدفع</th>
                                    <th>نوع الفاتوره</th>
                                    <th>اسم العميل</th>
                                    <th>الاجمالي</th>
                                    <th>العمله</th>
                                    <th>المدفوع</th>
                                    <th>المتبقي</th>
                                    <th>الضريبه</th>
                                    <th>الملاحظات</th>
                                    <th>المضيف</th>
                                    <th>تفاصيل</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $o)
                                    <tr>
                                        <td>
                                            {{ $o->invoice_number != null ? $o->invoice_number : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $o->payment_type != null ? $o->payment_type : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $o->invoice_type != null ? $o->invoice_type : 'لا يوجد' }}
                                        </td>

                                        <td>
                                            @foreach ($supplier->where('id', $o->client_id) as $c)
                                                @if ($c->id == $o->client_id)
                                                    {{ $c->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="total">
                                            {{ $o->total != null ? $o->total : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $o->currency != null ? $o->currency : 'لا يوجد' }}
                                        </td>
                                        <td class="paid">
                                            {{ $o->paid != null ? $o->paid : 'لا يوجد' }}
                                        </td>
                                        <td class="due">
                                            @if ($o->invoice_type=='توريد')
                                                -{{ $o->due != null ? $o->due : 'لا يوجد' }}
                                            @else
                                                {{ $o->due != null ? $o->due : 'لا يوجد' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $o->tax != null ? $o->tax : 'لا يوجد' }}
                                        </td>

                                        <td>
                                            {{ $o->note != null ? $o->note : 'لا يوجد' }}
                                        </td>
                                        <td>
                                            {{ $o->whoadd != null ? $o->whoadd : 'لا يوجد' }}
                                        </td>

                                        <td>
                                            <a title="تفاصيل" href="{{ route('orders.show', $o->id) }}"
                                                class="details btn btn-warning btn-xs ml-1" style="color: white !important">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('orders.destroy', $o->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="حذف" class="btn btn-danger btn-xs delete">
                                                    <i class="fa fa-trash "></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #337ab7;color:white">
                                    <td colspan="4">الاجمالي</td>
                                    <td id="total"></td>
                                    <td></td>
                                    <td id="paid"></td>
                                    <td id="due"></td>
                                    <td colspan="5"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">التوريدات</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">

                    <div class="card-body">
                        <table class="display example" style="width:100%;overflow-x: auto">
                            <thead>
                                <tr style="color:white">

                                    <th style="background: rgb(99, 37, 35);" colspan="22">
                                        <center>
                                            <h5>بيانات التوريد</h5>
                                        </center>
                                    </th>

                                </tr>
                                <tr>
                                    <th>رقم الاذن</th>
                                    <th>الررقم الحرفي</th>
                                    <th>رقم المصنع</th>
                                    <th>اسم الخامه</th>
                                    <th>رقم العميل </th>
                                    <th>اسم العميل</th>
                                    <th>تاريخ التوريد</th>
                                    <th>عدد البلوكات</th>
                                    <th>طول</th>
                                    <th>عرض</th>
                                    <th>ارتفاع</th>
                                    <th>صافي م3</th>
                                    <th>نسبة الخصم</th>
                                    <th>الصافي بعد الخصم</th>
                                    <th>سعر المتر</th>
                                    <th>التكلفه</th>
                                    <th>تفاصيل النشر</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($important as $imp)
                                    <tr>
                                        <td>رقم الاذن</td>
                                        <td>
                                            {{ $imp->number_herfy }}
                                        </td>
                                        <td>
                                            {{ $imp->number_factory }}
                                        </td>
                                        <td>
                                            {{ $imp->name }}
                                        </td>
                                        <td>
                                            {{ $imp->name_client }}
                                        </td>
                                        <td>
                                            @if (count($supplier->where('id', $imp->name_client)) == 0)
                                                <span style="color: white;width: ;" class="btn btn-danger">
                                                    لا يوجد
                                                </span>
                                            @else
                                                @foreach ($supplier->where('id', $imp->name_client) as $pubup)
                                                    {{ $pubup->name }}
                                                @endforeach
                                            @endif

                                        </td>
                                        <td>{{ $imp->date }}</td>
                                        <td class="qty">
                                            {{ $imp->qty }}
                                        </td>
                                        <td class="height">{{ $imp->height }}</td>
                                        <td class="width">{{ $imp->width }}</td>
                                        <td class="volum">{{ $imp->volum }}</td>
                                        <td class="safy">{{ $imp->safy }}</td>
                                        <td>{{ $imp->discount }}</td>
                                        <td class="safy_after">{{ $imp->safy_after }}</td>
                                        <td class="price">{{ $imp->price }}</td>
                                        <td class="amount">{{ $imp->amount }}</td>
                                        <td>
                                            <a target="_blank" title="تفاصيل"
                                                href="{{ route('collection.edit', $imp->id) }}"
                                                class="details btn btn-warning btn-xs ml-1" style="color: white !important">
                                                <i class="fas fa-eye" style="color: white !important"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #337ab7;color:white">
                                    <td colspan="7">
                                        الاجمالي
                                    </td>
                                    <td id="qty"></td>
                                    <td id="height"></td>
                                    <td id="width"></td>
                                    <td id="volum"></td>
                                    <td id="safy"></td>
                                    <td></td>
                                    <td id="safy_after"></td>
                                    <td id="price"></td>
                                    <td id="amount"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">النشر</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">

                    <div class="card-body">
                        <table class="display example" style="width:100%;overflow-x: auto">
                            <thead>
                                <tr style="color:white">

                                    <th style="background: rgb(150, 54, 52);" colspan="29">
                                        <center>
                                            <h5>بيانات النشر والصرف</h5>
                                        </center>
                                    </th>

                                </tr>
                                <tr>
                                    <th>عدد بلوكات النشر</th>
                                    <th>تاريخ النشر</th>
                                    <th>رقم الماكينه</th>
                                    <th>سمك الالماظ</th>
                                    <th>سمك النشر</th>
                                    <th>اجمالي السمك </th>
                                    <th>عدد المسحات </th>
                                    <th>عدد الطاولات </th>
                                    <th>طول</th>
                                    <th>عرض</th>
                                    <th>ارتفاع</th>
                                    <th>صافي م3</th>
                                    <th>السعر</th>
                                    <th>قيمة ال م3</th>
                                    <th>سعر المسحه</th>
                                    <th>قيمة المسحه</th>
                                    <th>اكراميه</th>
                                    <th>اجمالي القيمه</th>
                                    <th>تكلفة النقل</th>
                                    <th>اجمالي التكلفه</th>
                                    <th>صافي م2</th>
                                    <th>تكلفة م2 بعد الكشف الشامل للمخزن</th>
                                    <th>تفاصيل الصرف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publisher as $pub)
                                    <tr>

                                        <td class="qty_publish">
                                            {{ $pub->qty_publish }}
                                        </td>
                                        <td>
                                            {{ $pub->date }}
                                        </td>

                                        <td>
                                            {{ $pub->number_makina }}
                                        </td>

                                        <td class="volum_almaza">
                                            {{ $pub->volum_almaza }}
                                        </td>
                                        <td class="volum_publish">
                                            {{ $pub->volum_publish }}
                                        </td>
                                        <td class="volum_amount">
                                            {{ $pub->volum_amount }}
                                        </td>
                                        <td class="number_smears">
                                            {{ $pub->number_smears }}
                                        </td>
                                        <td class="number_tables">
                                            {{ $pub->number_tables }}
                                        </td>

                                        <td class="height2">
                                            {{ $pub->height }}
                                        </td>
                                        <td class="width2">
                                            {{ $pub->width }}
                                        </td>
                                        <td class="volum2">
                                            {{ $pub->volum }}
                                        </td>
                                        <td class="safy2">
                                            {{ $pub->safy }}
                                        </td>
                                        <td class="price2">
                                            {{ $pub->price }}
                                        </td>
                                        <td class="amount2">
                                            {{ $pub->amount }}
                                        </td>
                                        <td class="price_mears2">
                                            {{ $pub->price_mears }}
                                        </td>

                                        <td class="amount_mears2">
                                            {{ $pub->amount_mears }}
                                        </td>
                                        <td class="tip">
                                            {{ $pub->tip }}
                                        </td>
                                        <td class="amount_all">
                                            {{ $pub->amount_all }}
                                        </td>
                                        <td class="price_charge">
                                            {{ $pub->price_charge }}
                                        </td>
                                        <td class="amount_all_plus">
                                            {{ $pub->amount_all_plus }}
                                        </td>
                                        <td class="safy2m2">
                                            {{ $pub->safym2 }}
                                        </td>
                                        <td class="amount_with_safym2">
                                            {{ $pub->amount_with_safym2 }}
                                        </td>
                                        <td>
                                            <a target="_blank" title="تفاصيل"
                                                href="{{ route('collection.show', $pub->id) }}"
                                                class="details btn btn-warning btn-xs ml-1" style="color: white !important">
                                                <i class="fas fa-eye" style="color: white !important"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #337ab7;color:white">
                                    <td id="qty_publish"></td>
                                    <td></td>
                                    <td></td>
                                    <td id="volum_almaza">
                                    </td>
                                    <td id="volum_publish">
                                    </td>
                                    <td id="volum_amount">
                                    </td>
                                    <td id="number_smears">
                                    </td>
                                    <td id="number_tables">
                                    </td>
                                    <td id="height2">
                                    </td>
                                    <td id="width2">
                                    </td>
                                    <td id="volum2">
                                    </td>
                                    <td id="safy2">
                                    </td>
                                    <td id="price2">
                                    </td>
                                    <td id="amount2">
                                    </td>
                                    <td id="price_mears2">
                                    </td>
                                    <td id="amount_mears2">
                                    </td>
                                    <td id="tip">
                                    </td>
                                    <td id="amount_all">
                                    </td>
                                    <td id="price_charge">
                                    </td>
                                    <td id="amount_all_plus">
                                    </td>
                                    <td id="safy2m2">
                                    </td>
                                    <td id="amount_with_safym2">
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">التصنيع والتحميل</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="display example" style="width:100%;overflow-x: auto">
                        <thead>
                            <tr>
                                <th style="background: rgb(255, 180, 10);color: white" colspan="20">
                                    <center>
                                        <h5>بيانات التصنيع والتحميل</h5>
                                    </center>
                                </th>
                            </tr>
                            <tr>
                                {{-- <th>البيان</th> --}}
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

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exporter as $exp)
                                <tr>
                                    <td>
                                        {{ $exp->date }}
                                    </td>
                                    <td>
                                        {{ $exp->code }}
                                    </td>
                                    <td>
                                        {{ $exp->describ }}
                                    </td>
                                    <td class="qty3">
                                        {{ $exp->qty }}
                                    </td>
                                    <td class="height3">
                                        {{ $exp->height }}
                                    </td>
                                    <td class="volum3">
                                        {{ $exp->volum }}
                                    </td>
                                    <td class="safy3m2">
                                        {{ $exp->safym2 }}
                                    </td>
                                    <td class="price3">
                                        {{ $exp->price }}
                                    </td>
                                    <td class="amount3">
                                        {{ $exp->amount }}
                                    </td>
                                    <td class="qty_refuse">
                                        {{ $exp->qty_refuse }}
                                    </td>
                                    <td class="allqty_refuse">
                                        {{ $exp->allqty_refuse }}
                                    </td>

                                    <td class="amount_refuse">
                                        {{ $exp->amount_refuse }}
                                    </td>
                                    <td class="qty_found">
                                        {{ $exp->qty_found }}
                                    </td>
                                    <td class="qtyall_found">
                                        {{ $exp->qtyall_found }}
                                    </td>
                                    <td class="amount_found">
                                        {{ $exp->amount_found }}
                                    </td>
                                    <td class="import_miuns_publish_befor_discount">
                                        {{ $exp->import_miuns_publish_befor_discount }}
                                    </td>
                                    <td class="import_miuns_publish_after_discount">
                                        {{ $exp->import_miuns_publish_after_discount }}
                                    </td>
                                    <td class="import_miuns_export">
                                        {{ $exp->import_miuns_export }}
                                    </td>
                                    <td class="god">
                                        {{ $exp->god }}
                                    </td>
                                    <td>
                                        {{ $exp->number_hawya }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot style="background: #337ab7;color: #fff;">
                            <tr>
                                <td colspan="3">الاجمالي</td>
                                <td id="qty3">
                                </td>
                                <td id="height3">
                                </td>
                                <td id="volum3">
                                </td>
                                <td id="safy3m2">
                                </td>
                                <td id="price3">
                                </td>
                                <td id="amount3">
                                </td>
                                <td id="qty_refuse">
                                </td>
                                <td id="allqty_refuse">
                                </td>
                                <td id="amount_refuse">
                                </td>
                                <td id="qty_found">
                                </td>
                                <td id="qtyall_found">
                                </td>
                                <td id="amount_found">
                                </td>
                                <td id="import_miuns_publish_befor_discount">
                                </td>
                                <td id="import_miuns_publish_after_discount">
                                </td>
                                <td id="import_miuns_export">
                                </td>
                                <td id="god">
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            $('.example').DataTable({
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
                    "paginate": {
                        "previous": "  السابق",
                        "next": " التالي",
                    }
                }
            })

            //======================================================
            //===================== Orders =========================
            //======================================================
            var total = 0;
            $(".total").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total += amount;
                $("#total").text(total.toFixed(2));
            })
            var total2 = 0;
            $(".paid").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total2 += amount;
                $("#paid").text(total2.toFixed(2));
            })
            var total3 = 0;
            $(".due").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total3 += amount;
                $("#due").text(total3.toFixed(2));
            })

            //======================================================
            //=================== Important ========================
            //======================================================
            var total4 = 0;
            $(".qty").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total4 += amount;
                $("#qty").text(total4.toFixed(2));
            })
            var total5 = 0;
            $(".height").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total5 += amount;
                $("#height").text(total5.toFixed(2));
            })
            var total6 = 0;
            $(".width").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total6 += amount;
                $("#width").text(total6.toFixed(2));
            })
            var total7 = 0;
            $(".volum").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total7 += amount;
                $("#volum").text(total7.toFixed(2));
            })
            var total8 = 0;
            $(".safy").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total8 += amount;
                $("#safy").text(total8.toFixed(2));
            })
            var total9 = 0;
            $(".safy_after").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total9 += amount;
                $("#safy_after").text(total9.toFixed(2));
            })
            var total10 = 0;
            $(".price").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total10 += amount;
                $("#price").text(total10.toFixed(2));
            })
            var total11 = 0;
            $(".amount").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total11 += amount;
                $("#amount").text(total11.toFixed(2));
            })

            //======================================================
            //==================== Exporter ========================
            //======================================================
            var total12 = 0;
            $(".qty_publish").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total12 += amount;
                $("#qty_publish").text(total12.toFixed(2));
            })
            var total13 = 0;
            $(".volum_publish").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total13 += amount;
                $("#volum_publish").text(total13.toFixed(2));
            })
            var total14 = 0;
            $(".volum_almaza").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total14 += amount;
                $("#volum_almaza").text(total14.toFixed(2));
            })
            var total15 = 0;
            $(".volum_amount").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total15 += amount;
                $("#volum_amount").text(total15.toFixed(2));
            })
            var total16 = 0;
            $(".number_smears").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total16 += amount;
                $("#number_smears").text(total16.toFixed(2));
            })
            var total17 = 0;
            $(".number_tables").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total17 += amount;
                $("#number_tables").text(total17.toFixed(2));
            })
            var total18 = 0;
            $(".height2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total18 += amount;
                $("#height2").text(total18.toFixed(2));
            })
            var total19 = 0;
            $(".width2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total19 += amount;
                $("#width2").text(total19.toFixed(2));
            })
            var total20 = 0;
            $(".volum2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total20 += amount;
                $("#volum2").text(total20.toFixed(2));
            })
            var total21 = 0;
            $(".safy2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total21 += amount;
                $("#safy2").text(total21.toFixed(2));
            })
            var total22 = 0;
            $(".price2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total22 += amount;
                $("#price2").text(total22.toFixed(2));
            })
            var total23 = 0;
            $(".amount2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total23 += amount;
                $("#amount2").text(total23.toFixed(2));
            })
            var total24 = 0;
            $(".price_mears2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total24 += amount;
                $("#price_mears2").text(total24.toFixed(2));
            })
            var total25 = 0;
            $(".amount_mears2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total25 += amount;
                $("#amount_mears2").text(total25.toFixed(2));
            })
            var total26 = 0;
            $(".tip").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total26 += amount;
                $("#tip").text(total26.toFixed(2));
            })
            var total27 = 0;
            $(".amount_all").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total27 += amount;
                $("#amount_all").text(total27.toFixed(2));
            })
            var total28 = 0;
            $(".price_charge").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total28 += amount;
                $("#price_charge").text(total28.toFixed(2));
            })
            var total29 = 0;
            $(".amount_all_plus").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total29 += amount;
                $("#amount_all_plus").text(total29.toFixed(2));
            })
            var total30 = 0;
            $(".safy2m2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total30 += amount;
                $("#safy2m2").text(total30.toFixed(2));
            })
            var total31 = 0;
            $(".amount_with_safym2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total31 += amount;
                $("#amount_with_safym2").text(total31.toFixed(2));
            })

            //======================================================
            //=================== Important ========================
            //======================================================
            var total32 = 0;
            $(".qty3").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total32 += amount;
                $("#qty3").text(total32.toFixed(2));
            })
            var total33 = 0;
            $(".height3").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total33 += amount;
                $("#height3").text(total33.toFixed(2));
            })
            var total34 = 0;
            $(".volum3").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total34 += amount;
                $("#volum3").text(total34.toFixed(2));
            })
            var total35 = 0;
            $(".safy3m2").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total35 += amount;
                $("#safy3m2").text(total35.toFixed(2));
            })
            var total36 = 0;
            $(".price3").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total36 += amount;
                $("#price3").text(total36.toFixed(2));
            })
            var total37 = 0;
            $(".amount3").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total37 += amount;
                $("#amount3").text(total37.toFixed(2));
            })
            var total38 = 0;
            $(".qty_refuse").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total38 += amount;
                $("#qty_refuse").text(total38.toFixed(2));
            })
            var total39 = 0;
            $(".allqty_refuse").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total39 += amount;
                $("#allqty_refuse").text(total39.toFixed(2));
            })
            var total40 = 0;
            $(".amount_refuse").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total40 += amount;
                $("#amount_refuse").text(total40.toFixed(2));
            })
            var total41 = 0;
            $(".qty_found").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total41 += amount;
                $("#qty_found").text(total41.toFixed(2));
            })
            var total42 = 0;
            $(".qtyall_found").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total42 += amount;
                $("#qtyall_found").text(total42.toFixed(2));
            })
            var total43 = 0;
            $(".amount_found").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total43 += amount;
                $("#amount_found").text(total43.toFixed(2));
            })
            var total44 = 0;
            $(".import_miuns_publish_befor_discount").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total44 += amount;
                $("#import_miuns_publish_befor_discount").text(total44.toFixed(2));
            })
            var total45 = 0;
            $(".import_miuns_publish_after_discount").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total45 += amount;
                $("#import_miuns_publish_after_discount").text(total45.toFixed(2));
            })
            var total46 = 0;
            $(".import_miuns_export").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total46 += amount;
                $("#import_miuns_export").text(total46.toFixed(2));
            })
            var total47 = 0;
            $(".god").each(function(x, y) {
                var amount = parseFloat($(this).text()) - 0;
                total47 += amount;
                $("#god").text(total47.toFixed(2));
            })
        })
    </script>
    <script>
        $('.datepicker').datepicker({
            autoclose: true,
            rtl: true,
            format: 'yyyy-mm-dd',
            changeMonth: true,
            changeYear: true,
        });
    </script>
@endsection
@section('style')
    <style>
        .dataTables_processing {
            font-size: 30px!important;
            font-weight: bold;
            color: #4267b2;
        }
        .table {
            border: 1px solid #020202 !important;
        }
        .table td,.table th {
            border: 1px solid #020202 !important;
        }
        a:hover {
            text-decoration: none;
        }
        @media print {
            .hideprint {
                visibility: hidden;
                display: none;
                margin: 0;
            }
            #footer,footer{display: none;margin: 0}

            tfoot tr td{
                border: none!important;
            }
        }
        div.dataTables_paginate {
            text-align: left;
        }
        .datepicker.dropdown-menu{
            right:initial;
        }
        .modal-open .select2-dropdown {
            z-index: 10060;
        }

        .modal-open .select2-close-mask {
            z-index: 10055;
        }
        .unitclass{
            width: 100%;
            border: none;
            background: transparent;
            padding: 0 8px;
            outline: 0;
        }
        .unit.input-group-addon:last-child {
            padding: 0;
            min-width: 80px;
        }
        .sidebar-menu .treeview-menu li.active {
            background-color: #3c763c;
        }
        .modal-fullscreen .modal-dialog {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .modal-fullscreen .modal-content {
            height: auto;
            min-height: 100%;
            border: 0 none;
            border-radius: 0;
        }
        .slimScrollBar{
            width: 8px!important;
            background:#3c8dbc!important;


        }
        /*div#dataList_wrapper div#dataList_filter{
            position: absolute;
            top: 0.6%;
            right: 20%;
        }
        .dataTables_wrapper .dataTables_filter {
            position: absolute;
            top: 1%;
            right: 23%;
        }*/


        .tt-dataset.tt-dataset-products {
            z-index: 10000;
            overflow: scroll;
            width: 750px;
            background: #eee;
            font-weight: bold;
        }
        aside.main-sidebar {
            overflow: hidden !important;
            overflow-y: auto !important;
            height: 100vh;
        }
        .s-header{
            background: #337ab7;
            color: #fefefe;
            font-weight: bold;
        }
        .s-row {
            display: table-row;
        }
        .s-cell {
            display: table-cell;
            padding: 5px;
            border: 1px solid black;
        }
        .tt-menu {
            width: auto;
        }

        .tt-dataset {
            display: table;
            width: 700px!important;
            z-index: 100000;
        }
        .loader{
            position: relative;
            float: left;
            z-index: 1000;
            color: #3c8dbc;
            font-size: 30px!important;
            left: 60px;
        }

    </style>
@endsection
