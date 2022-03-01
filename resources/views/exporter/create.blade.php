@extends('layouts.app')
@section('title')
    فاتورة تصنيع وتحميل
@endsection
@section('header-link')
    <a href="{{ route('exporter.create') }}">انشاء فاتورة تصنيع وتحميل</a> / التصنيع وتحميلات
@endsection
@section('header-name')
    فاتورة تصنيع وتحميل
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">انشاء فاتوره</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form >
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> البيان</label>
                                <input type="text" class="form-control name" placeholder="البيان">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> كود الطلبيه</label>
                                <input type="text" class="form-control code" placeholder="كود الطلبيه">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> الوصف</label>
                                <input type="text" class="form-control describ" placeholder="الوصف">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> اسم الخامه</label>
                                <select class="form-control select2 publisher_id" id="publisher_id">
                                    {{-- @foreach ($publisher as $cli)
                                        <option title="الطول {{$cli->height}} العرض {{$cli->width}} الارتفاع {{$cli->volum}}" value="{{ $cli->id }}" aria-valuemax="{{ $cli->copy_number_tables}}">{{ $cli->important->name }} {{ $cli->important->number_herfy }}{{ $cli->important->number_factory }}</option>
                                    @endforeach --}}
                                    @foreach ($collection as $coll)
                                        @foreach ($coll->publisher as $cli)
                                            <option
                                                title="الطول {{ $cli->height }} العرض {{ $cli->width }} الارتفاع {{ $cli->volum }}"
                                                value="{{ $cli->id }}" aria-valuemax="{{ $cli->copy_number_tables }}"
                                                safy-imp="{{ $coll->safy }}" safy-pub="{{ $cli->safy }}"
                                                safy-desc="{{ $coll->safy_after }}" safym2="{{ $cli->safym2 }}"
                                                amount-all-plus="{{ $cli->amount_all_plus }}">
                                                {{ $cli->important->name }}
                                                {{ $cli->important->number_herfy }}{{ $cli->important->number_factory }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> العدد</label>
                                <div class="input-group">
                                    <input type="text" class="form-control qty" placeholder="العدد">
                                    <div class="input-group-prepend " id="qty_table">

                                    </div>
                                </div>
                                <input type="hidden" class="qty_input">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> الطول</label>
                                <input type="text" class="form-control height" placeholder="الطول">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> الارتفاع</label>
                                <input type="text" class="form-control volum" placeholder="الارتفاع">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> صافي م2</label>
                                <input type="text" class="form-control safym2" placeholder="صافي م2">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> اسم العميل</label>
                                <select class="form-control select2 name_client">
                                    @foreach ($client as $cli)
                                        <option value="{{ $cli->id }}">{{ $cli->name }}&nbsp;&nbsp;&nbsp;&nbsp; <span >{{ $cli->type }}</span></option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <pre>
                                 {{ $publisher }}
                            </pre> --}}

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> السعر</label>
                                <input type="text" class="form-control price" placeholder="السعر">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label">التكلفه</label>
                                <input type="text" class="form-control amount" placeholder="التكلفه">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> عدد طاولات الرفض</label>
                                <input type="text" class="form-control qty_refuse" placeholder="عدد طاولات الرفض">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> اجمالي كميه الرفض</label>
                                <input type="text" class="form-control allqty_refuse" placeholder="اجمالي كميه الرفض">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> اجمالي قيمة الرفض</label>
                                <input type="text" class="form-control amount_refuse" placeholder="اجمالي قيمة الرفض">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> المتبقي من الطاولات</label>
                                <input type="text" class="form-control qty_found" placeholder="المتبقي من الطاولات">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> اجمالي الكميه المتبقيه</label>
                                <input type="text" class="form-control qtyall_found" placeholder="اجمالي الكميه المتبقيه">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> اجمالي قيمة المتبقي</label>
                                <input type="text" class="form-control amount_found" placeholder="اجمالي قيمة المتبقي">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> الفرق بين الشراء والنشر قبل الخصم م3</label>
                                <input type="text" class="form-control import_miuns_publish_befor_discount"
                                    placeholder="الفرق بين الشراء والنشر قبل الخصم م3">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> الفرق بين الشراء والنشر بعد الخصم م3</label>
                                <input type="text" class="form-control import_miuns_publish_after_discount"
                                    placeholder="الفرق بين الشراء والنشر بعد الخصم م3">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> الفرق بين النشر والتصنيع / التحميل م2</label>
                                <input type="text" class="form-control import_miuns_export"
                                    placeholder="الفرق بين النشر والتصنيع / التحميل م2">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> صافي ربح البلوك</label>
                                <input type="text" class="form-control god" placeholder="صافي الربح البلوك">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> رقم الحاويه</label>
                                <input type="text" class="form-control number_hawya" placeholder="رقم الحاويه">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> التاريخ</label>
                                <input type="date" class="form-control date" placeholder="التاريخ">
                                <input type="hidden" class="mo">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> اسم المخزن</label>
                                <select class="form-control select2 store_id">
                                    @foreach ($store as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" id="add" type="button">
                                    تسجيل الفاتوره
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <style>
            table,
            th,
            td {
                border: 1px solid #000 !important
            }

            .card-body {
                overflow: auto
            }

        </style>
        <div class="col-12 mb-3 ">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">ملخص الفاتوره</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <div class="card-body">
                        <form class="form" action="{{ route('exporter.store') }}" method="POST">
                            @csrf
                            <table class="order_total table table-striped">
                                <thead>
                                    <tr>
                                        <th>رقم الفاتوره</th>
                                        <th>نوع الفاتوره</th>
                                        <th>نوع الدفع</th>
                                        <th>الاجمالي </th>
                                        <th>العمله</th>
                                        <th>المدفوع</th>
                                        <th>المتبقي</th>
                                        <th>الضريبه</th>
                                        <th>رقم العميل</th>
                                        <th>الملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" style="border: none;background: none;"
                                                value="{{ $invoice_number }}" name="invoice_number">
                                        </td>
                                        <td>
                                            <input type="text" style="border: none;background: none;" value="تحميل"
                                                name="invoice_type">
                                        </td>
                                        <td>
                                            <select style="width: 100%;" class=" select2 payment_type" name="payment_type">
                                                <option value="كاش">كاش</option>
                                                <option value="اجل">اجل</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" style="border: none;background: none;" id='total'
                                                name="total">
                                        </td>
                                        <td>
                                            <select style="width: 100%;" class=" select2" name="currency">
                                                @foreach ($currencyCode as $code)
                                                    <option {{ $code == 'EGP' ? 'selected' : '' }}
                                                        value="{{ $code }}">
                                                        {{ $code }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" style="border: none;background: none;" class="paid"
                                                name="paid">
                                        </td>
                                        <td>
                                            <input type="text" style="border: none;background: none;"
                                                class="due" name="due">
                                        </td>
                                        <td>
                                            <input type="text" style="border: none;background: none;"
                                                class="tax" name="tax">
                                        </td>
                                        <td>
                                            <input type="text" style="border: none;background: none;"
                                                class="name_client2" name="client_id">
                                        </td>
                                        <td>
                                            <input type="text" style="border: none;background: none;"
                                                class="note" name="note">
                                            <input type="hidden" value="{{ Auth::user()->name }}" name="whoadd">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="order_num table table-striped" style="width:100%;overflow-x: auto">
                                <thead>
                                    <tr>
                                        <th>البيان</th>
                                        <th>التاريخ</th>
                                        <th>الكود</th>
                                        <th>الوصف</th>
                                        <th>رقم الخامه</th>
                                        <th>رقم العميل </th>
                                        <th>العدد</th>
                                        <th>الطول</th>
                                        <th>الارتفاع</th>
                                        <th>صافي م2</th>
                                        <th>السعر</th>
                                        <th>التكلفه</th>
                                        <th>عدد طاولات الرفض</th>
                                        <th>اجمالي كميه الرفض</th>
                                        <th>اجمالي قيمة الرفض</th>
                                        <th>المتبقي من الطاولات</th>
                                        <th>اجمالي الكميه المتبقيه</th>
                                        <th>اجمالي قيمة المتبقي</th>
                                        <th>الفرق بين الشراء والنشر قبل الخصم</th>
                                        <th>الفرق بين الشراء والنشر بعد الخصم</th>
                                        <th>الفرق بين النشر والتصنيع / التحميل م2</th>
                                        <th>صافي ربح البلوك</th>
                                        <th>رقم الحاويه</th>
                                        <th>رقم المخزن</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="25">
                                            <button type="submit" class="btn btn-primary w-100">
                                                انهاء الفاتوره
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            //#region code_start
            var publisher_val = $("#publisher_id option:selected").attr("aria-valuemax");
            $("#qty_table").append('<div class="input-group-text qty_table_pub bg-danger">' + publisher_val +
                '</div>');
            var input_val = $(".qty_table_pub").text();
            $(".qty_input").val(input_val);

            var safy_imp = $("#publisher_id option:selected").attr("safy-imp");
            var safy_pub = $("#publisher_id option:selected").attr("safy-pub");
            var safy_desc = $("#publisher_id option:selected").attr("safy-desc");
            var calc1 = parseFloat(safy_pub - safy_imp).toFixed(3);
            var calc2 = parseFloat(safy_pub - safy_desc).toFixed(3);
            // var calc1 = parseFloat(safy_pub-safy_imp).toFixed(3);
            $(".import_miuns_publish_befor_discount").val(calc1);
            $(".import_miuns_publish_after_discount").val(calc2);
            //#endregion
            $("#publisher_id").change(function() {
                $("#qty_table").html('');
                var publisher_val = $("#publisher_id option:selected").attr("aria-valuemax");
                $("#qty_table").append('<div class="input-group-text qty_table_pub bg-danger">' +
                    publisher_val + '</div>');
                var input_val = $(".qty_table_pub").text();
                $(".qty_input").val(input_val);

                var safy_imp = $("#publisher_id option:selected").attr("safy-imp");
                var safy_pub = $("#publisher_id option:selected").attr("safy-pub");
                var safy_desc = $("#publisher_id option:selected").attr("safy-desc");
                var calc1 = parseFloat(safy_pub - safy_imp).toFixed(3);
                var calc2 = parseFloat(safy_pub - safy_desc).toFixed(3);
                // var calc1 = parseFloat(safy_pub-safy_imp).toFixed(3);
                $(".import_miuns_publish_befor_discount").val(calc1);
                $(".import_miuns_publish_after_discount").val(calc2);
            })
            $(".qty").keyup(function() {
                var calc = (parseFloat($(".qty_input").val()) - parseFloat($(this).val())).toFixed(1);
                $(".qty_table_pub").text(calc);
                // $(".qty_input").val(calc);
                if ($(".qty_table_pub").text() == 'NaN' || $(".qty_table_pub").text() == '') {
                    $(".qty_table_pub").text($(".qty_input").val());
                    //console.log($(".qty_input").val());
                }
            })
            $(".qty,.height,.volum").keyup(function() {
                var qty = $(".qty").val();
                var height = $(".height").val();
                var volum = $(".volum").val();
                var calc = parseFloat(qty * height * volum).toFixed(3);
                $(".safym2").val(calc);

                var safym2 = $(".safym2").val();
                var safym2_pub = $("#publisher_id option:selected").attr("safym2");
                var final_calc = parseFloat(safym2 - safym2_pub).toFixed(3);
                $(".import_miuns_export").val(final_calc);

            })
            $(".price").keyup(function() {
                var price = $(".price").val();
                var safym2 = $(".safym2").val();
                var calc = parseFloat(price * safym2).toFixed(3);
                $(".amount").val(calc);

                var amount = $(".amount").val();
                var amount_all_plus = $("#publisher_id option:selected").attr("amount-all-plus");
                var final_calc = parseFloat(amount - amount_all_plus).toFixed(3);
                $(".god").val(final_calc);
            })
            $(".qty_refuse,.allqty_refuse").keyup(function() {
                var qty_refuse = $(".qty_refuse").val();
                var height = $(".height").val();
                var volum = $(".volum").val();
                var calc_qty = parseFloat(qty_refuse * height * volum).toFixed(3);
                $(".allqty_refuse").val(calc_qty);

                var allqty_refuse = $(".allqty_refuse").val();
                var price = $(".price").val();
                var calc_amount = parseFloat(price * allqty_refuse).toFixed(3);
                $(".amount_refuse").val(calc_amount);


            })
            $(".qty_refuse").keyup(function() {

                var calc = (parseFloat($(".qty_input").val()) - parseFloat($(".qty").val()) - $(
                    ".qty_refuse").val()).toFixed(1);
                if ($(".qty_refuse").val() == '') {
                    calc = (parseFloat($(".qty_input").val()) - parseFloat($(".qty").val())).toFixed(1);
                }
                $(".qty_table_pub").text(calc);
                if ($(".qty_table_pub").text() == 'NaN' || $(".qty_table_pub").text() == '') {
                    $(".qty_table_pub").text($(".qty_input").val());
                }

            })
            $(".qty_refuse,.qty").keyup(function() {
                var table_found = $(".qty_table_pub").text();
                var height = $(".height").val();
                var volum = $(".volum").val();
                var price = $(".price").val();
                var calc = parseFloat(table_found * height * volum).toFixed(3);
                $(".qty_found").val(table_found);
                $(".qtyall_found").val(calc);
                var qtyall_found = $(".qtyall_found").val();
                var calc_amount = parseFloat(price * qtyall_found).toFixed(3);
                $(".amount_found").val(calc_amount);
            })
            $(".date").keyup(function(){
                $(".mo").val($(".date").val().split('-')[1])
            })
            $(".date").change(function(){
                $(".mo").val($(".date").val().split('-')[1])
            })
            $(".date").click(function(){
                $(".mo").val($(".date").val().split('-')[1])
            })
            $("#add").click(function() {

                var name = $('.name').val();
                var publisher_id = $('#publisher_id option:selected').val();
                var name_client = $('.name_client option:selected').val();
                var code = $('.code').val();
                var describ = $('.describ').val();
                var qty = $('.qty').val();
                var height = $('.height').val();
                var volum = $('.volum').val();
                var safym2 = $('.safym2').val();
                var price = $('.price').val();
                var amount = $('.amount').val();
                var qty_refuse = $('.qty_refuse').val();
                var allqty_refuse = $('.allqty_refuse').val();
                var amount_refuse = $('.amount_refuse').val();
                var qty_found = $('.qty_found').val();
                var qtyall_found = $('.qtyall_found').val();
                var amount_found = $('.amount_found').val();
                var import_miuns_publish_befor_discount = $('.import_miuns_publish_befor_discount').val();
                var import_miuns_publish_after_discount = $('.import_miuns_publish_after_discount').val();
                var import_miuns_export = $('.import_miuns_export').val();
                var god = $('.god').val();
                var number_hawya = $('.number_hawya').val();
                var date = $('.date').val();
                var month = $('.mo').val();
                var store_id = $('.store_id option:selected').val();
                $(" .order_num tbody").append('<tr>' +
                    '<td><input style="border:none;background:none" type="text" value="' + name +
                    '" name="name[]"></td>' +

                    '<td><input style="border:none;background:none" type="text" value="' + date +
                    '" name="date[]"><input type="hidden" value="' + month +
                    '" name="month[]"></td>' +

                    '<td><input style="border:none;background:none" type="text" value="' +
                    code + '" name="code[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    describ + '" name="describ[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    publisher_id +
                    '" name="publisher_id[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    name_client + '" name="name_client[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + qty +
                    '" name="qty[]" class="qty_check"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + height +
                    '" name="height[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + volum +
                    '" name="volum[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + safym2 +
                    '" name="safym2[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + price +
                    '" name="price[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" class="tot" value="' +
                    amount + '" name="amount[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    qty_refuse + '" name="qty_refuse[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    allqty_refuse + '" name="allqty_refuse[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    amount_refuse + '" name="amount_refuse[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    qty_found + '" name="qty_found[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    qtyall_found + '" name="qtyall_found[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    amount_found + '" name="amount_found[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    import_miuns_publish_befor_discount +
                    '" name="import_miuns_publish_befor_discount[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    import_miuns_publish_after_discount +
                    '" name="import_miuns_publish_after_discount[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    import_miuns_export + '" name="import_miuns_export[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    god + '" name="god[]"></td>' +
                    '<td><input style="border:none;background:none" type="text"  value="' +
                    number_hawya + '" name="number_hawya[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + store_id +
                    '" name="store_id[]"></td>' +
                    '<td><button type="button" title="حذف"  class="btn btn-danger btn-xs del"><i class="fa fa-trash " ></i></button></i></td>' +
                    '</tr>');
                $(".name_client2").val($(".name_client option:selected").val());
                var total = 0;
                $(".tot").each(function(x, y) {
                    var amount = $(this).val() - 0;
                    total += amount;
                    // console.log(total);
                    $("#total").val(total.toFixed(3));
                    if ($(".payment_type option:selected").val() == 'كاش') {
                        $(".paid").val(total.toFixed(3));
                        $(".tax").val(0);
                        $(".note").val('لا يوجد');
                        $(".due").val(0);
                    }
                });

                $('.name').val('');
                $('.code').val('');
                $('.describ').val('');
                $('.qty').val('');
                $('.height').val('');
                $('.volum').val('');
                $('.safym2').val('');
                $('.price').val('');
                $('.amount').val('');
                $('.qty_refuse').val('');
                $('.allqty_refuse').val('');
                $('.amount_refuse').val('');
                $('.qty_found').val('');
                $('.qtyall_found').val('');
                $('.amount_found').val('');
                $('.import_miuns_export').val('');
                $('.god').val('');
                $('.number_hawya').val('');
                $('.date').val('');
                $('.mo').val('');
                alertify.success(" تم اضافة الي الجدول الموجود بالاسفل بنجاح ");
            });
            $("tbody").on("click", ".del", function() {
                $(this).parent().parent().remove();
                var total = 0;
                $(".tot").each(function(x, y) {
                    var amount = $(this).val() - 0;
                    total += amount;
                    $("#total").val(total.toFixed(3));
                    $(".paid").val(total.toFixed(3));
                });
                alertify.error(" تم ازالة العنصر من الجدول الموجود بالاسفل بنجاح ");
            });
            $(".payment_type").change(function() {
                if ($(".payment_type option:selected").val() == 'اجل') {
                    var paid = $(".paid").val();
                    var total = $("#total").val();
                    $(".due").val((total - paid).toFixed(3));
                }
            });
            $(".paid").keyup(function() {
                var paid = $(".paid").val();
                var total = $("#total").val();
                $(".due").val((total - paid).toFixed(3));
            })
            $(".form").submit(function( event ) {
                var total_check = 0;
                $(".qty_check").each(function(){
                    var amount = $(this).val() - 0;
                    total_check += amount;
                })
                // if ( total_check <=  $(".qty_input").val() ) {
                    return;
                // }
                // Swal.fire({
                // title: "الكميه اللتي تحاول اضافتها اكبر من الموجوده بالمخزن ",
                // type: "error",
                // icon:"error",
                // confirmButtonColor: "#dc3545",
                // confirmButtonText: "رجوع",
                // });
                event.preventDefault();
            });
        })
    </script>
@endsection
