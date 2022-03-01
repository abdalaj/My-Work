@extends('layouts.app')
@section('title')
    فاتورة توريد
@endsection
@section('header-link')
    <a href="{{ route('important.create') }}">انشاء فاتورة توريد</a> / التوريدات
@endsection
@section('header-name')
    فاتورة توريد
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
                    <div>
                        <div class="row">

                            {{-- <input type="text" value="{{ $invoice_number }}" id=""> --}}
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> البيان</label>
                                <input type="text" class="form-control name" placeholder="اسم البيان">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> التاريخ</label>
                                <input type="date" class="form-control date" placeholder="التاريخ">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> الرقم الحرفي</label>
                                <select style="text-transform: capitalize" class="number_herfy form-control select2">
                                    @php
                                        $arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
                                    @endphp
                                    @for ($i = 0; $i < count($arr); $i++)
                                        <option value={{ $arr[$i] }}>{{ $arr[$i] }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> رقم المصنع</label>
                                <input type="text" class="form-control number_factory" placeholder="رقم المصنع">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> اسم العميل</label>
                                <select class="form-control select2 name_client">
                                    @foreach ($supplier as $sup)
                                        <option value="{{ $sup->id }}">{{ $sup->name }} &nbsp;&nbsp;&nbsp;&nbsp;
                                            <span>{{ $sup->type }}</span></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> الكميه</label>
                                <input type="text" class="form-control qty" placeholder="الكميه">
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
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> الصافي</label>
                                <input type="text" class="form-control safy" placeholder="الصافي">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> الخصم</label>
                                <input type="text" class="form-control discount" placeholder="الخصم">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 col-md-3 col-sm-12">
                                <label class="control-label"> الصافي بعد الخصم</label>
                                <input type="text" class="form-control safy_after" placeholder="الصافي بعد الخصم">
                            </div>
                            <div class="form-group col-4 col-md-4 col-sm-12">
                                <label class="control-label"> السعر</label>
                                <input type="text" class="form-control price" placeholder="السعر">
                            </div>
                            <div class="form-group col-4 col-md-4 col-sm-12">
                                <label class="control-label"> الاجمالي</label>
                                <input type="text" class="form-control amount" placeholder="الاجمالي">
                                <input type="hidden" class="mo">
                            </div>
                            <div class="form-group col-4 col-md-4 col-sm-12">
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
        </div>
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
                        <form action="{{ route('important.store') }}" method="POST">
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
                                            <input type="text" style="border: none;background: none;" value="توريد"
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
                                        <th>التاريخ</th>
                                        <th>الرقم الحرفي</th>
                                        <th>رقم المصنع</th>
                                        <th>رقم العميل </th>
                                        <th>اسم العميل</th>
                                        <th>الكميه</th>
                                        <th>الطول</th>
                                        <th>العرض</th>
                                        <th>الارتفاع</th>
                                        <th>الصافي</th>
                                        <th>الخصم</th>
                                        <th>الصافي بعد الخصم</th>
                                        <th>السعر</th>
                                        <th>الاجمالي</th>
                                        <th>رقم المخزن</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="17">
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
                $(".height,.width,.volum").keyup(function() {
                    var height = $(".height").val();
                    var width = $(".width").val();
                    var volum = $(".volum").val();
                    var amo = parseFloat(height * width * volum).toFixed(3);
                    $(".safy").val(amo);
                });
                $(".discount").keyup(function() {
                    var discount = $(".discount").val();
                    var safy = $(".safy").val();
                    if (discount != '') {
                        var amo = (safy * (1 - discount)).toFixed(3);
                        $(".safy_after").val(amo);
                    } else {
                        $(".safy_after").val('');
                    }
                });
                $(".price").keyup(function() {
                    var price = $(this).val();
                    var safy_after = $(".safy_after").val();
                    var safy = $(".safy").val();
                    var qty = $(".qty").val();
                    if (safy_after == '' && safy != null) {
                        $(".amount").val((safy * price * qty).toFixed(3));
                    } else if (safy_after != null && safy != null) {
                        $(".amount").val((safy_after * price * qty).toFixed(3));
                    }
                })
                $(".date").keyup(function() {
                    $(".mo").val($(".date").val().split('-')[1])
                })
                $(".date").change(function() {
                    $(".mo").val($(".date").val().split('-')[1])
                })
                $(".date").click(function() {
                    $(".mo").val($(".date").val().split('-')[1])
                })
                $("#add").click(function() {

                    var name = $('.name').val();
                    var number_herfy = $('.number_herfy option:selected').val();
                    var number_client = $('.name_client option:selected').val();
                    var number_factory = $('.number_factory').val();
                    var name_client = $('.name_client option:selected').val();
                    var qty = $('.qty').val();
                    var width = $('.width').val();
                    var height = $('.height').val();
                    var volum = $('.volum').val();
                    var safy = $('.safy').val();
                    var discount = $('.discount').val();
                    var safy_after = $('.safy_after').val();
                    var price = $('.price').val();
                    var amount = $('.amount').val();
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
                        number_herfy + '" name="number_herfy[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' +
                        number_factory + '" name="number_factory[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' +
                        number_client + '" name="number_client[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + name_client +
                        '" name="name_client[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + qty +
                        '" name="qty[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + height +
                        '" name="height[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + width +
                        '" name="width[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + volum +
                        '" name="volum[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + safy +
                        '" name="safy[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + discount +
                        '" name="discount[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + safy_after +
                        '" name="safy_after[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + price +
                        '" name="price[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" class="tot" value="' +
                        amount + '" name="amount[]"></td>' +
                        '<td><input style="border:none;background:none" type="text" value="' + store_id +
                        '" name="store_id[]"></td>' +
                        '<td><button type="button" title="حذف"  class="btn btn-danger btn-xs del"><i class="fa fa-trash " ></i></button></i></td>' +
                        '</tr>');

                    $(".name_client2").val($(".name_client option:selected").val());
                    var total = 0;
                    $(".tot").each(function(x, y) {
                        var amount = $(this).val() - 0;
                        total += amount;
                        console.log(total);
                        $("#total").val(total);
                        if ($(".payment_type option:selected").val() == 'كاش') {
                            $(".paid").val(total);
                            $(".tax").val(0);
                            $(".note").val('لا يوجد');
                            $(".due").val(0);
                        }
                    });
                    $('.name').val('');
                    $('.number_factory').val('');
                    $('.qty').val('');
                    $('.width').val('');
                    $('.height').val('');
                    $('.volum').val('');
                    $('.safy').val('');
                    $('.mo').val('');
                    $('.discount').val('');
                    $('.safy_after').val('');
                    $('.price').val('');
                    $('.amount').val('');
                    alertify.success(" تم اضافة " + number_herfy + " " + number_client +
                        " الي الجدول الموجود بالاسفل بنجاح ");
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
                    // $(this).parent().next().next().next().find(".paid").focus();
                });
                $(".paid").keyup(function() {
                    var paid = $(".paid").val();
                    var total = $("#total").val();
                    $(".due").val((total - paid).toFixed(3));
                })
            })
        </script>
    @endsection
