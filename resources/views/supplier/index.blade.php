@extends('layouts.app')
@section('title')
    الموردين والعملاء
@endsection
@section('header-name')
    الموردين والعملاء
@endsection
@section('header-link')
    <a href="{{ route('supplier.index') }}">الموردين والعملاء</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 35)) > 0)
                    @if ($roles->where('roles_id', 35)->first()->roles_id == 35)

                        <div class="card-header">
                            <a href="{{ route('supplier.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-supplier", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-supplier') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-supplier') + "px");

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
                                        <th>رقم المورد </th>
                                        <th>اسم المورد</th>
                                        <th>رقم الهاتف</th>
                                        <th>العنوان</th>
                                        <th>النوع</th>
                                        <th>الحساب</th>
                                        <th>اضيف بواسطة</th>
                                        @if (count($roles->where('roles_id', 36)) > 0)
                                            @if ($roles->where('roles_id', 36)->first()->roles_id == 36)

                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 38)) > 0)
                                            @if ($roles->where('roles_id', 38)->first()->roles_id == 38)

                                                <th>تعاملات</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 39)) > 0)
                                            @if ($roles->where('roles_id', 39)->first()->roles_id == 39)

                                                <th>تحصيل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 37)) > 0)
                                            @if ($roles->where('roles_id', 37)->first()->roles_id == 37)

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
                                                {{ $s->number_phone != null ? $s->number_phone : 'غير متاح' }}
                                            </td>
                                            <td>
                                                {{ $s->address != null ? $s->address : 'غير متاح' }}
                                            </td>

                                            <td>
                                                {{ $s->type != null ? $s->type : 'غير متاح' }}
                                            </td>
                                            <td>
                                                @if ($s->due > 0)
                                                    عليه {{ $s->due }} ( مدين )
                                            @elseif ($s->due < 0) له {{ abs($s->due) }} ( دائن ) @else
                                                    {{ $s->due }} ( لا ليه ولا عليه ) @endif
                                        </td>
                                        <td>
                                            {{ $s->whoadd }}
                                        </td>
                                        @if (count($roles->where('roles_id', 36)) > 0)
                                            @if ($roles->where('roles_id', 36)->first()->roles_id == 36)

                                                <td>
                                                    <a title="تعديل" href="{{ route('supplier.edit', $s->id) }}"
                                                        class="edit btn btn-primary btn-xs ml-1">
                                                        <i class="fa fa-edit "></i>
                                                    </a>
                                                </td>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 38)) > 0)
                                            @if ($roles->where('roles_id', 38)->first()->roles_id == 38)
                                                <td>
                                                    <a title="تعاملات" href="{{ route('supplier.show', $s->id) }}"
                                                        class="edit btn btn-warning btn-xs ml-1">
                                                        <i class="fa fa-eye" style="color: white !important"></i>
                                                    </a>
                                                </td>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 39)) > 0)
                                            @if ($roles->where('roles_id', 39)->first()->roles_id == 39)

                                                <td>
                                                    <button mony="{{ $s->due }}" value="{{ $s->id }}"
                                                        type="button " class="btn btn-success getmony"
                                                        data-toggle="modal" data-target="#modal-primary"><i
                                                            class="fa fa-money-bill"
                                                            style="color: white !important"></i></button>
                                                </td>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 37)) > 0)
                                            @if ($roles->where('roles_id', 37)->first()->roles_id == 37)

                                                <td>
                                                    <form action="{{ route('supplier.destroy', $s->id) }}"
                                                        method="POST">
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
                <h4 class="modal-title">تحصيل اموال عميل رقم <span class="id_client"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="control-label"> المبلغ</label>
                            <div class="input-group">
                                <input required type="text" name="mony" class="form-control mony" placeholder="المبلغ">
                                <div class="input-group-text  bg-success  mony_client">

                                </div>
                                <input type="hidden" class="copy_mony">
                            </div>
                            <input type="hidden" name="whoadd" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group col-12">
                            <div class="input-group">
                                <select required name="supplier_type" class="form-control" style="width: 100% !important">
                                <option value=""> الحساب كا ؟</option>
                                <option value="1">عميل</option>
                                <option value="2">مورد</option>
                            </select>
                            </div>
                            <input type="hidden" name="whoadd" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group col-12">
                            <select required name="bank_id" class="select2 " style="width: 100% !important">
                                <option value=""> للخزنه ؟</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
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
            $(".id_client").text(getmony);
            $(".form").attr("action", "/getmony/" + getmony);

            var due = $(this).attr('mony');
            $(".mony_client").text(Math.abs(due));
            $(".copy_mony").val(Math.abs(due));
            if (due < 0) {
                $(".mony_client").attr('title', 'متبقي عليك');
            } else if (due > 0) {
                $(".mony_client").attr('title', 'متبقي لك عنده');
            }
        });
        $(".mony").keyup(function() {
            var mony_client = $(".copy_mony").val();
            var mony = $(".mony").val();
            var calc = parseFloat(mony_client - mony).toFixed(2);
            $(".mony_client").text(calc);
        });
    })
</script>
@endsection
