@extends('layouts.app')
@section('title')
    الموظفين
@endsection
@section('header-name')
    الموظفين
@endsection
@section('header-link')
    <a href="{{ route('staff.index') }}">الموظفين</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 41)) > 0)
                    @if ($roles->where('roles_id', 41)->first()->roles_id == 41)

                        <div class="card-header">
                            <a href="{{ route('staff.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-staff", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-staff') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-staff') + "px");

                        })
                    </script>

                    حجم الخط
                    <select class="font" style="width: 100%">
                        @for ($i = 0; $i <= 100; $i += 2)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @endfor
                    </select>
                    <div class="card-body " style="width: 100% !important;overflow-x:auto ">
                        <style>
                            table,
                            th,
                            td {
                                border: 1px solid #000 !important
                            }

                        </style>
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>رقم الموظف</th>
                                        <th>اسم الموظف</th>
                                        <th>الوظيفه</th>
                                        <th>رقم الهاتف</th>
                                        <th>راتب الموظف</th>
                                        <th>عدد ايام العمل</th>
                                        <th>اليوميه</th>
                                        <th>تاريخ بداية العمل</th>
                                        <th>ملاحظات</th>
                                        @if (count($roles->where('roles_id', 42)) > 0)
                                            @if ($roles->where('roles_id', 42)->first()->roles_id == 42)
                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 44)) > 0)
                                            @if ($roles->where('roles_id', 44)->first()->roles_id == 44)
                                                <th>التفاصيل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 43)) > 0)
                                            @if ($roles->where('roles_id', 43)->first()->roles_id == 43)
                                                <th>حذف</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 45)) > 0)
                                            @if ($roles->where('roles_id', 45)->first()->roles_id == 45)
                                                <th>مكافأه او عقوبه</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 46)) > 0)
                                            @if ($roles->where('roles_id', 46)->first()->roles_id == 46)
                                                <th>المرتب والسلف</th>
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
                                                {{ $s->type }}
                                            </td>
                                            <td>
                                                {{ $s->phone }}
                                            </td>
                                            <td>
                                                {{ $s->salery }}
                                            </td>
                                            <td>
                                                {{ $s->days }}
                                            </td>
                                            <td>
                                                {{ $s->salery_days }}
                                            </td>
                                            <td>
                                                {{ $s->date }}
                                            </td>
                                            <td>
                                                @if ($s->notes == null)
                                                    لايوجد
                                                @else
                                                    {{ $s->notes }}
                                                @endif
                                            </td>
                                            @if (count($roles->where('roles_id', 42)) > 0)
                                                @if ($roles->where('roles_id', 42)->first()->roles_id == 42)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('staff.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 44)) > 0)
                                                @if ($roles->where('roles_id', 44)->first()->roles_id == 44)
                                                    <td>
                                                        <a title="تفاصيل" href="{{ route('staff.show', $s->id) }}"
                                                            class="edit btn btn-info btn-xs ml-1">
                                                            <i class="fa fa-eye "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 43)) > 0)
                                                @if ($roles->where('roles_id', 43)->first()->roles_id == 43)
                                                    <td>
                                                        <form action="{{ route('staff.destroy', $s->id) }}"
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
                                            @if (count($roles->where('roles_id', 45)) > 0)
                                                @if ($roles->where('roles_id', 45)->first()->roles_id == 45)
                                                    <td>
                                                        <button value="{{ $s->id }}" title="مكافأه او عقوبه"
                                                            type="button" class="win_btn btn btn-warning btn-xs ml-1"
                                                            style="color: white !important" data-toggle="modal"
                                                            data-target="#modal-primary"><i
                                                                class="fa fa-money-bill"></i></button>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 46)) > 0)
                                                @if ($roles->where('roles_id', 46)->first()->roles_id == 46)
                                                    <td>
                                                        <button value="{{ $s->id }}" data-toggle="modal"
                                                            data-target="#modal-warning" type="button" title="السلف والقبض"
                                                            class="edit btn btn-success btn-xs ml-1 git_btn">
                                                            <i class="fa fa-dollar-sign"></i>
                                                        </button>
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
                    <h4 class="modal-title">مكافأه او عقوبه للموظف رقم <span class="emp_id"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="form_1" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="control-label"> البيان</label>
                                <input required type="text" name="name" class="form-control name" placeholder="البيان">
                                <input type="hidden" name="staff_id" class="staff_id">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> النوع</label>
                                <select name="type" class="form-control type " required>
                                    <option value="1">مكافأه</option>
                                    <option value="2">عقوبه</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> المبلغ</label>
                                <input required type="text" name="mony" class="form-control mony" placeholder="المبلغ">
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
    <div class="modal fade" id="modal-warning">
        <div class="modal-dialog">
            <div class="modal-content t " style="border-top: 3px solid #007bff">
                <div class="modal-header">
                    <h4 class="modal-title">المرتب والسلف<span class="emp_id"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="form_2" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="control-label"> البيان</label>
                                <input required type="text" name="name" class="form-control name" placeholder="البيان">
                                <input type="hidden" name="staff_id" class="staff_id">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> المبلغ</label>
                                <input required type="text" name="mony" class="form-control mony" placeholder="المبلغ">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> اسم المصروف</label><br>
                                <select style="width: 100% !important" name="prushes_id" class="select2">
                                    @foreach ($prushes as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label"> الخزنه</label><br>
                                <select style="width: 100% !important" name="bank_id" class="form-control">
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
            $("body").on("click", ".win_btn", function() {
                var get_id = $(this).val();
                $(".emp_id").text(get_id);
                $(".staff_id").val(get_id);
                $(".form_1").attr("action", "/win/" + get_id);
            });
            $("body").on("click", ".git_btn", function() {
                var get_id = $(this).val();
                $(".emp_id").text(get_id);
                $(".staff_id").val(get_id);
                $(".form_2").attr("action", "/staffmony/" + get_id);
            });
            // $(".selectCat").select2({
            //     tags: true,
            //     createTag: function (params) {
            //         var term = $.trim(params.term);
            //         if (term === '') {
            //             return null;
            //         }
            //         return {
            //             id: term,
            //             text: term
            //         };
            //     }
            // }).on('select2:select', function (evt) {
            //     $.ajax({
            //         type: "POST",
            //         url: "api/prushes",
            //         data: {
            //             _token: "{{ csrf_token() }}",
            //             name:evt.params.data.text,
            //         },
            //         success:function(e){
            //             return;
            //         }
            //     });
            // });
            // $(".selectCat").trigger("change");

        })
    </script>
@endsection
