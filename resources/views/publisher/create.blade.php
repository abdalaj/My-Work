@extends('layouts.app')
@section('title')
    فاتورة نشر و صرف
@endsection
@section('header-link')
    <a href="{{ route('publisher.create') }}">انشاء فاتورة نشر و صرف</a> / النشر و الصرف
@endsection
@section('header-name')
    فاتورة نشر و صرف
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
                    <form action="{{ route('publisher.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> اسم العميل</label>
                                <select class="form-control  name_client">
                                    @foreach ($client as $cli)
                                        <option value="{{ $cli->id }}">{{ $cli->name }} &nbsp;&nbsp;&nbsp;&nbsp; <span >{{ $cli->type }}</span></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> البيان</label>
                                <input type="text" class="form-control name" placeholder="اسم البيان">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label">اسم البلوكه (رقم المصنع)</label>
                                <div class="input-group">

                                    <select class="form-control important_id select2" id="important_id">
                                        @foreach ($important as $cli)
                                            <option
                                                title="الطول {{ $cli->height }} العرض {{ $cli->width }} الارتفاع {{ $cli->volum }}"
                                                aria-valuetext="{{ $cli->amount }}" value="{{ $cli->id }}">
                                                {{ $cli->name }} {{ $cli->number_herfy }}
                                                {{ $cli->number_factory }} </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-prepend">

                                    </div>
                                </div>

                            </div>

                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> رقم الماكينه</label>
                                <input type="text" class="form-control number_makina" placeholder="رقم الماكينه">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> سمك الالماظ</label>
                                <input type="text" class="form-control volum_almaza" placeholder="سمك الالماظ">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> سمك النشر</label>
                                <input type="text" class="form-control volum_publish" placeholder="سمك النشر">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> اجمالي السمك</label>
                                <input type="text" class="form-control volum_amount" placeholder="اجمالي السمك">
                            </div>


                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> عدد الطاولات</label>
                                <input type="text" class="form-control number_tables" placeholder="عدد الطاولات">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> عدد بلوكات النشر </label>
                                <input type="text" class="form-control qty_publish" placeholder="عدد بلوكات النشر">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> الطول</label>
                                <input type="text" class="form-control height" placeholder="الطول">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> العرض</label>
                                <input type="text" class="form-control width" placeholder="العرض">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> الارتفاع</label>
                                <input type="text" class="form-control volum" placeholder="الارتفاع">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> الصافي م3</label>
                                <input type="text" class="form-control safy" placeholder="الصافي م3">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> سعر المتر</label>
                                <input type="text" class="form-control price" placeholder="سعر المتر">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> قيمة ال م3</label>
                                <input type="text" class="form-control amount" placeholder="قيمة ال م3">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> عدد المسحات</label>
                                <input type="text" class="form-control number_smears" placeholder="عدد المسحات">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label"> سعر المسحه</label>
                                <input type="text" class="form-control price_mears" placeholder="سعر المسحه">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> قيمة المسحه</label>
                                <input type="text" class="form-control amount_mears" placeholder="قيمة المسحه">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> اكرامية</label>
                                <input type="text" class="form-control tip" placeholder="اكرامية">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> اجمالي القيمه</label>
                                <input type="text" class="form-control amount_all" placeholder="اجمالي القيمه">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> تكلفة النقل</label>
                                <input type="text" value="0" class="form-control price_charge" placeholder="تكلفة النقل">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> اجمالي التكلفه</label>
                                <input type="text" class="form-control amount_all_plus " placeholder="اجمالي التكلفه">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> صافي م2</label>
                                <input type="text" class="form-control safym2" placeholder="صافي م2">
                            </div>

                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> تكلفة م2 بعد النشر</label>
                                <input type="text" class="form-control amount_with_safym2" placeholder="تكلفة م2 بعد النشر">
                            </div>
                            <div class="form-group col-6 col-md-6 col-sm-12">
                                <label class="control-label"> التاريخ</label>
                                <input type="date" class="form-control date" placeholder="التاريخ">
                                <input type="hidden" class="mo">
                            </div>
                            <div class="form-group col-6 col-md-6 col-sm-12">
                                <label class="control-label"> اسم المخزن</label>
                                <select class="form-control select2 store_id">
                                    @foreach ($store as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 " id="add" type="button">
                                    تسجيل الفاتوره
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="card-body">
                    <form action="{{ route('publisher.store') }}" method="POST">
                        @csrf
                        <table class="order_total table table-striped" style="width:100%;overflow-x: auto">
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
                                        <input type="text" style="border: none;background: none;" value="نشر"
                                            name="invoice_type">
                                    </td>
                                    <td>
                                        <select style="width: 100%;" class=" select2 payment_type" name="payment_type">
                                            <option value="كاش">كاش</option>
                                            <option value="اجل">اجل</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" style="border: none;background: none;" id='total' name="total">
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
                                        <input type="text" style="border: none;background: none;" class="due"
                                            name="due">
                                    </td>
                                    <td>
                                        <input type="text" style="border: none;background: none;" class="tax"
                                            name="tax">
                                    </td>
                                    <td>
                                        <input type="text" style="border: none;background: none;" class="name_client2"
                                            name="client_id">
                                    </td>
                                    <td>
                                        <input type="text" style="border: none;background: none;" class="note"
                                            name="note">
                                        <input type="hidden" value="{{ Auth::user()->name }}" name="whoadd">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="order_num table table-striped" style="width:100%;overflow-x: auto">
                            <thead>
                                <tr>
                                    <th>البيان</th>
                                    <th>اسم العميل </th>
                                    <th>رقم المصنع</th>
                                    <th>عدد بلوكات النشر</th>
                                    <th>رقم الماكينه</th>
                                    <th>سمك الالماظه</th>
                                    <th>سمك النشر</th>
                                    <th>اجمالي السمك</th>
                                    <th>عدد المسحات</th>
                                    <th>سعر المسحه</th>
                                    <th>قيمة المسحه</th>
                                    <th>عدد الطاولات</th>
                                    <th>الطول</th>
                                    <th>العرض</th>
                                    <th>الارتفاع</th>
                                    <th>الصافي م3</th>
                                    <th>السعر</th>
                                    <th>قيمة ال م3 </th>
                                    <th>اكراميه</th>
                                    <th>اجمالي القيمه</th>
                                    <th>تكلفة النقل</th>
                                    <th>اجمالي التكلفه</th>
                                    <th>صافي م2</th>
                                    <th>تكلفة م2 بعد النشر</th>
                                    <th>التاريخ</th>
                                    <th>رقم المخزن</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="27">
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

@endsection
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(".important_id option:selected").change(function(){
            alert("aaaaa");
            // $(".input-group-prepend").append('<div class="input-group-text bg-danger">'+$(this).attr("aria-valuetext")+'</div>');
        })
</script> --}}
@section('script')
    <script>
        $(function() {
            var optVal = $("#important_id option:selected").attr("aria-valuetext");
            $(".input-group-prepend").append('<div class="input-group-text amount_important bg-danger">' + optVal +
                '</div>');
            $(document.body).on('click', "#important_id", function(e) {
                $(".input-group-prepend").html('');

                var optVal = $("#important_id option:selected").attr("aria-valuetext");
                $(".input-group-prepend").append(
                    '<div class="input-group-text amount_important bg-danger">' + optVal + '</div>');

            });
            $(document.body).on('change', "#important_id", function(e) {
                $(".input-group-prepend").html('');
                var optVal = $("#important_id option:selected").attr("aria-valuetext");
                $(".input-group-prepend").append(
                    '<div class="input-group-text amount_important bg-danger">' + optVal + '</div>');

            });
            $(".height,.width,.volum,.qty_publish").keyup(function() {
                var height = $(".height").val();
                var width = $(".width").val();
                var volum = $(".volum").val();
                var qty = $(".qty_publish").val();
                var amo = parseFloat(height * width * volum * qty).toFixed(3);
                $(".safy").val(amo);
                var qty_table = $(".number_tables").val();
                var calc = $(".safym2").val(parseFloat(qty_table * height * volum).toFixed(3));
                // alert("x");
            });
            $(".price").keyup(function() {
                var price = $(this).val();
                var safy = $(".safy").val();
                $(".amount").val((safy * price).toFixed(3));
            });
            $(".number_smears,.price_mears").keyup(function() {
                if ($(".number_smears").val() == '') {
                    $(".number_smears").val(0);
                }
                if ($(".price_mears").val() == '') {
                    $(".price_mears").val(0);
                }
                var price_mears = $(".price_mears").val();
                var number_smears = $(".number_smears").val();
                $(".amount_mears").val(parseFloat(price_mears * number_smears).toFixed(3));
            });
            $(".tip").keyup(function() {
                var tip = $(".tip").val();
                if (tip == '') {
                    $(".tip").val(0);
                }
                var calc = (parseFloat($(".amount_mears").val()) + parseFloat($(".tip").val()) + parseFloat(
                    $(".amount").val())).toFixed(3);
                $(".amount_all").val(calc);
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
                var number_client = $('.name_client option:selected').val();
                var important_id = $('.important_id option:selected').val();
                var qty_publish = $('.qty_publish').val();
                var number_makina = $('.number_makina ').val();
                var volum_almaza = $('.volum_almaza').val();
                var volum_publish = $('.volum_publish').val();
                var volum_amount = $('.volum_amount').val();
                var number_smears = $('.number_smears').val();
                var width = $('.width').val();
                var height = $('.height').val();
                var volum = $('.volum').val();
                var number_tables = $('.number_tables').val();
                var safy = $('.safy').val();
                var price = $('.price').val();
                var amount = $('.amount').val();
                var price_mears = $('.price_mears').val();
                var amount_mears = $('.amount_mears').val();
                var tip = $('.tip').val();
                var amount_all = $('.amount_all').val();
                var amount_all_plus = $('.amount_all_plus').val();
                var price_charge = $('.price_charge').val();
                var amount_with_safym2 = $('.amount_with_safym2').val();
                var safym2 = $('.safym2').val();
                var date = $('.date').val();
                var month = $('.mo').val();
                var store_id = $('.store_id option:selected').val();

                $(" .order_num tbody").append('<tr>' +
                    '<td><input style="border:none;background:none" type="text" value="' + name +
                    '" name="name[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    number_client +
                    '" name="name_client[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    important_id +
                    '" name="important_id[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + qty_publish +
                    '" name="qty_publish[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    number_makina +
                    '" name="number_makina[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    volum_almaza +
                    '" name="volum_almaza[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    volum_publish +
                    '" name="volum_publish[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    volum_amount +
                    '" name="volum_amount[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    number_smears +
                    '" name="number_smears[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + price_mears +
                    '" name="price_mears[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    amount_mears +
                    '" name="amount_mears[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    number_tables +
                    '" name="number_tables[]"></td>' +

                    '<td><input style="border:none;background:none" type="text" value="' + height +
                    '" name="height[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + width +
                    '" name="width[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + volum +
                    '" name="volum[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + safy +
                    '" name="safy[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + price +
                    '" name="price[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + amount +
                    '" name="amount[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + tip +
                    '" name="tip[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + amount_all +
                    '" name="amount_all[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    price_charge +
                    '" name="price_charge[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    amount_all_plus +
                    '" name="amount_all_plus[]" class="tot"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' + safym2 +
                    '" name="safym2[]"></td>' +
                    '<td><input style="border:none;background:none" type="text" value="' +
                    amount_with_safym2 +
                    '" name="amount_with_safym2[]"></td>' +

                    '<td><input style="border:none;background:none" type="text" value="' + date +
                    '" name="date[]"><input type="hidden" value="' + month +
                    '" name="month[]"></td>' +

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
                $('.qty_publish').val('');
                $('.number_makina ').val('');
                $('.volum_almaza').val('');
                $('.volum_publish').val('');
                $('.volum_amount').val('');
                $('.number_smears').val('');
                $('.width').val('');
                $('.height').val('');
                $('.volum').val('');
                $('.number_tables').val('');
                $('.safy').val('');
                $('.price').val('');
                $('.amount').val('');
                $('.price_mears').val('');
                $('.amount_mears').val('');
                $('.tip').val('');
                $('.amount_all').val('');
                $('.amount_all_plus').val('');
                $('.price_charge').val('');
                $('.amount_with_safym2').val('');
                $('.safym2').val('');
                $('.date').val('');
                $('.mo').val('');
                alertify.success(" تم الاضافة الي الجدول الموجود بالاسفل بنجاح ");
            });
            $("tbody").on("click", ".del", function() {
                $(this).parent().parent().remove();
                var total = 0;
                $(".tot").each(function(x, y) {
                    var amount = $(this).val() - 0;
                    total += amount;
                    // console.log(total);
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
            $(".volum_almaza,.volum_publish").keyup(function() {
                var volum_almaza = $(".volum_almaza").val();
                if (volum_almaza == '') {
                    volum_almaza = $(".volum_almaza").val(0);
                }
                var volum_publish = $(".volum_publish").val();
                if (volum_publish == '') {
                    volum_publish = $(".volum_publish").val(0);
                }
                $(".volum_amount").val((parseFloat(volum_publish) + parseFloat(volum_almaza)).toFixed(3));

            })
            $(".amount_all,.price_charge").keyup(function() {
                var amount_important = parseFloat($(".amount_important").text());
                var amount_all = parseFloat($(".amount_all").val());
                var charge = parseFloat($(".price_charge").val());
                var end_ammount = parseFloat(amount_all + amount_important + charge).toFixed(3);
                var amount_all_plus = $(".amount_all_plus").val(end_ammount);
                var amount_all_plus2 = $(".amount_all_plus").val();
                var calc = $(".safym2").val();
                var end_able = parseFloat(amount_all_plus2 / calc).toFixed(3);
                $(".amount_with_safym2").val(end_able);
            })


        })
    </script>
@endsection
