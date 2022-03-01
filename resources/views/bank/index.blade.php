@extends('layouts.app')
@section('title')
    الخزنه
@endsection
@section('header-name')
    الخزنه
@endsection
@section('header-link')
    <a href="{{ route('bank.index') }}">الخزنه</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 26)) > 0)
                    @if ($roles->where('roles_id', 26)->first()->roles_id == 26)
                        <div class="card-header">

                            <a href="{{ route('bank.create') }}" class="btn bg-success" style="color: white">
                                <i class="fas fa-plus"></i> اضافه
                            </a>
                        </div>
                    @endif
                @endif
                <div class="p-4">
                    <script>
                        $(function() {
                            $(".font").change(function() {
                                var font = $(".font option:selected").val();
                                sessionStorage.setItem("font-bank", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-bank') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-bank') + "px");

                        })
                    </script>

                    حجم الخط
                    <select class="font" style="width: 100%">
                        @for ($i = 0; $i <= 100; $i += 2)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @endfor
                    </select>
                    <div class="card-body " style="width: 100% !important;">
                        <style>
                            table,
                            th,
                            td {
                                border: 1px solid #000 !important
                            }

                        </style>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>رقم الخزنه </th>
                                        <th>اسم الخزنه</th>
                                        <th>رصيد الخزنه</th>
                                        @if (count($roles->where('roles_id', 27)) > 0)
                                            @if ($roles->where('roles_id', 27)->first()->roles_id == 27)
                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 29)) > 0)
                                            @if ($roles->where('roles_id', 29)->first()->roles_id == 29)
                                                <th>الايداع والسحب</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 28)) > 0)
                                            @if ($roles->where('roles_id', 28)->first()->roles_id == 28)

                                                <th>حذف</th>
                                            @endif
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $s)
                                        <tr>
                                            <td>
                                                {{ $s->id }}
                                            </td>
                                            <td>
                                                {{ $s->name }}
                                            </td>
                                            <td>
                                                {{ $s->amount }}
                                            </td>

                                            @if (count($roles->where('roles_id', 27)) > 0)
                                                @if ($roles->where('roles_id', 27)->first()->roles_id == 27)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('bank.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif

                                            @if (count($roles->where('roles_id', 29)) > 0)
                                                @if ($roles->where('roles_id', 29)->first()->roles_id == 29)
                                                    <td>
                                                        <button value="{{ $s->id }}" mony="{{ $s->amount }}"
                                                            type="button " class="btn btn-success getmony"
                                                            data-toggle="modal" data-target="#modal-primary"><i
                                                                class="fa fa-money-bill"
                                                                style="color: white !important"></i></button>
                                                    </td>
                                                @endif
                                            @endif

                                            @if (count($roles->where('roles_id', 28)) > 0)
                                                @if ($roles->where('roles_id', 28)->first()->roles_id == 28)
                                                    <td>
                                                        <form action="{{ route('bank.destroy', $s->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" title="حذف"
                                                                class="btn btn-danger btn-xs delete">
                                                                <i class="fa fa-trash "></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
            <div class="modal-content t " style="border-top: 3px solid #007bff">
                <div class="modal-header">
                    <h4 class="modal-title">عمليات للخزنه رقم <span class="bank_id"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="control-label"> البيان</label>
                                <input required type="text" name="name" class="form-control " placeholder="البيان">
                                <input type="hidden" name="bank_id" class="real_bank_id">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> نوع العمليه</label>
                                <select name="type" class="form-control type" style="width: 100% !important">
                                    <option value="1" class="get">سحب</option>
                                    <option value="2">ايداع</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label class="control-label"> المبلغ</label>
                                <div class="input-group">
                                    <input required type="text" name="mony" class="form-control mony" placeholder="المبلغ">
                                    <div class="input-group-text  bg-success  mony_bank">

                                    </div>
                                    <input type="hidden" class="copy_mony">
                                </div>
                                <input type="hidden" name="whoadd" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> رصيد بعد العمليه</label>
                                <input required type="text" disabled class="form-control amount_after"
                                    placeholder="رصيد بعد العمليه">
                                <input type="hidden" name="amount_after" class="copy_amount_after">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">الغاء</button>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            $("body").on("click", ".getmony", function() {
                var getmony = $(this).val();
                $(".bank_id").text(getmony);
                $(".real_bank_id").val(getmony);
                $(".form").attr("action", "/banktransaction/" + getmony);

                var due = $(this).attr('mony');
                if (due <= 0) {
                    $(".get").remove();
                }
                $(".mony_bank").text(Math.abs(due));
                $(".copy_mony").val(Math.abs(due));
            });

            $(".mony").keyup(function() {
                var type = $(".type option:selected").val();
                if (type == 1) {
                    var mony_bank = $(".copy_mony").val();
                    var mony = $(".mony").val();
                    var calc = parseFloat(mony_bank - mony).toFixed(2);
                    $(".mony_bank").text(calc);
                    $(".copy_amount_after").val(calc);
                    $(".amount_after").val(calc);
                } else if (type == 2) {
                    var mony_bank = $(".copy_mony").val();
                    var mony = $(".mony").val();
                    var calc = parseFloat(parseFloat(mony_bank) + parseFloat(mony)).toFixed(2);
                    $(".mony_bank").text(calc);
                    $(".copy_amount_after").val(calc);
                    $(".amount_after").val(calc);
                }
            })
            $(".type").change(function() {
                var type = $(".type option:selected").val();

                if (type == 1) {
                    var mony_bank = $(".copy_mony").val();
                    var mony = $(".mony").val();
                    var calc = parseFloat(mony_bank - mony).toFixed(2);
                    $(".mony_bank").text(calc);
                    $(".copy_amount_after").val(calc);
                    $(".amount_after").val(calc);
                } else if (type == 2) {
                    var mony_bank = $(".copy_mony").val();
                    var mony = $(".mony").val();
                    var calc = parseFloat(parseFloat(mony_bank) + parseFloat(mony)).toFixed(2);
                    $(".mony_bank").text(calc);
                    $(".copy_amount_after").val(calc);
                    $(".amount_after").val(calc);
                }
            })
        })
    </script>
@endsection
