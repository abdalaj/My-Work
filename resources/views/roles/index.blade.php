@extends('layouts.app')
@section('title')
    صلاحيات لمستخدم رقم {{ $data->id }}
@endsection
@section('header-name')
    صلاحيات المستخدم رقم {{ $data->id }}
@endsection
@section('header-link')
    <a href="">صلاحيات المستخدم رقم {{ $data->id }}</a>
@endsection
@section('content')
    <div class="col-12">
        <div class="card ">
            <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
            <div class="p-4">
                <script>
                    $(function() {
                        $(".font").change(function() {
                            var font = $(".font option:selected").val();
                            sessionStorage.setItem("font-roles", font);
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-roles') + "px");
                        });
                        $("table,td,th").css("font-size", sessionStorage.getItem('font-roles') + "px");

                    })
                </script>
                حجم الخط
                <select class="font" style="width: 100%">
                    @for ($i = 0; $i <= 100; $i += 2)
                        <option value="{{ $i }}" selected>{{ $i }}</option>
                    @endfor
                </select>
                {{-- {{ $data }} --}}
                {{-- {{ $userRoles->where('roles_id',72)->first() }} --}}
                <div class="card-body " style="width:100%;overflow-x: auto">
                    <form class="form" action="{{ route('roles.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ $data->id }}">
                        <table class="table table-striped"
                            style="width:100% !important;overflow-x: auto;text-align: center !important;">
                            <thead>
                                <tr>
                                    <th>
                                        اسم المجموعه
                                    </th>
                                    <th>
                                        مشاهدة
                                    </th>
                                    <th>
                                        اضافة
                                    </th>
                                    <th>
                                        تعديل
                                    </th>
                                    <th>
                                        حذف
                                    </th>
                                    <th>
                                        الايداع والسحب
                                    </th>
                                    <th>
                                        تعاملات
                                    </th>
                                    <th>
                                        تحصيل
                                    </th>
                                    <th>
                                        تفاصيل
                                    </th>
                                    <th>
                                        مكافأه وعقوبه
                                    </th>
                                    <th>
                                        مرتب وسلف
                                    </th>
                                    <th>
                                        صلاحيات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-primary">
                                    <td colspan="12">
                                        <center style="font-weight: bold;font-size: 14px">
                                            نقاط البيع
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        فواتير التوريد
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 1)) > 0)
                                        @if ($userRoles->where('roles_id', 1)->first()->roles_id == 1)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="1">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 2)) > 0)
                                        @if ($userRoles->where('roles_id', 2)->first()->roles_id == 2)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="2">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 3)) > 0)
                                        @if ($userRoles->where('roles_id', 3)->first()->roles_id == 3)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="3">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 4)) > 0)
                                        @if ($userRoles->where('roles_id', 4)->first()->roles_id == 4)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="4">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        فواتير النشر
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 5)) > 0)
                                        @if ($userRoles->where('roles_id', 5)->first()->roles_id == 5)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="5">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 6)) > 0)
                                        @if ($userRoles->where('roles_id', 6)->first()->roles_id == 6)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="6">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 7)) > 0)
                                        @if ($userRoles->where('roles_id', 7)->first()->roles_id == 7)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="7">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 8)) > 0)
                                        @if ($userRoles->where('roles_id', 8)->first()->roles_id == 8)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="8">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        فواتير التصنيع
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 9)) > 0)
                                        @if ($userRoles->where('roles_id', 9)->first()->roles_id == 9)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="9">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 10)) > 0)
                                        @if ($userRoles->where('roles_id', 10)->first()->roles_id == 10)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="10">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 11)) > 0)
                                        @if ($userRoles->where('roles_id', 11)->first()->roles_id == 11)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="11">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 12)) > 0)
                                        @if ($userRoles->where('roles_id', 12)->first()->roles_id == 12)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="12">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        فواتير المشتريات
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 74)) > 0)
                                        @if ($userRoles->where('roles_id', 74)->first()->roles_id == 74)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="74">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 75)) > 0)
                                        @if ($userRoles->where('roles_id', 75)->first()->roles_id == 75)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="75">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 76)) > 0)
                                        @if ($userRoles->where('roles_id', 76)->first()->roles_id == 76)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="76">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 77)) > 0)
                                        @if ($userRoles->where('roles_id', 77)->first()->roles_id == 77)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="77">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       الهالكات
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 79)) > 0)
                                        @if ($userRoles->where('roles_id', 79)->first()->roles_id == 79)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="79">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 80)) > 0)
                                        @if ($userRoles->where('roles_id', 80)->first()->roles_id == 80)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="80">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 81)) > 0)
                                        @if ($userRoles->where('roles_id', 81)->first()->roles_id == 81)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="81">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 82)) > 0)
                                        @if ($userRoles->where('roles_id', 82)->first()->roles_id == 82)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="82">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       المرتجعات
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 83)) > 0)
                                        @if ($userRoles->where('roles_id', 83)->first()->roles_id == 83)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="83">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 84)) > 0)
                                        @if ($userRoles->where('roles_id', 84)->first()->roles_id == 84)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="84">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                       -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr class="bg-danger">
                                    <td colspan="12">
                                        <center style="font-weight: bold;font-size: 14px">
                                            الماليه والمخازن
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        المصروفات
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 13)) > 0)
                                        @if ($userRoles->where('roles_id', 13)->first()->roles_id == 13)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="13">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 14)) > 0)
                                        @if ($userRoles->where('roles_id', 14)->first()->roles_id == 14)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="14">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 15)) > 0)
                                        @if ($userRoles->where('roles_id', 15)->first()->roles_id == 15)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="15">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 16)) > 0)
                                        @if ($userRoles->where('roles_id', 16)->first()->roles_id == 16)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="16">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        تفاصيل المصروفات
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 17)) > 0)
                                        @if ($userRoles->where('roles_id', 17)->first()->roles_id == 17)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="17">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 18)) > 0)
                                        @if ($userRoles->where('roles_id', 18)->first()->roles_id == 18)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="18">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 19)) > 0)
                                        @if ($userRoles->where('roles_id', 19)->first()->roles_id == 19)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="19">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 20)) > 0)
                                        @if ($userRoles->where('roles_id', 20)->first()->roles_id == 20)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="20">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        المخازن
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 21)) > 0)
                                        @if ($userRoles->where('roles_id', 21)->first()->roles_id == 21)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="21">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 22)) > 0)
                                        @if ($userRoles->where('roles_id', 22)->first()->roles_id == 22)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="22">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 23)) > 0)
                                        @if ($userRoles->where('roles_id', 23)->first()->roles_id == 23)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="23">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 24)) > 0)
                                        @if ($userRoles->where('roles_id', 24)->first()->roles_id == 24)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="24">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle">
                                        الخزائن
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 25)) > 0)
                                        @if ($userRoles->where('roles_id', 25)->first()->roles_id == 25)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="25">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 26)) > 0)
                                        @if ($userRoles->where('roles_id', 26)->first()->roles_id == 26)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="26">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 27)) > 0)
                                        @if ($userRoles->where('roles_id', 27)->first()->roles_id == 27)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="27">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 28)) > 0)
                                        @if ($userRoles->where('roles_id', 28)->first()->roles_id == 28)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="28">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 29)) > 0)
                                        @if ($userRoles->where('roles_id', 29)->first()->roles_id == 29)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="29">
                                    </td>

                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        العملات
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 30)) > 0)
                                        @if ($userRoles->where('roles_id', 30)->first()->roles_id == 30)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="30">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 31)) > 0)
                                        @if ($userRoles->where('roles_id', 31)->first()->roles_id == 31)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="31">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 32)) > 0)
                                        @if ($userRoles->where('roles_id', 32)->first()->roles_id == 32)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="32">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 33)) > 0)
                                        @if ($userRoles->where('roles_id', 33)->first()->roles_id == 33)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="33">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr class="bg-success">
                                    <td colspan="12">
                                        <center style="font-weight: bold;font-size: 14px">
                                            المستخدمين
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        العملاء
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 34)) > 0)
                                        @if ($userRoles->where('roles_id', 34)->first()->roles_id == 34)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="34">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 35)) > 0)
                                        @if ($userRoles->where('roles_id', 35)->first()->roles_id == 35)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="35">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 36)) > 0)
                                        @if ($userRoles->where('roles_id', 36)->first()->roles_id == 36)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="36">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 37)) > 0)
                                        @if ($userRoles->where('roles_id', 37)->first()->roles_id == 37)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="37">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 38)) > 0)
                                        @if ($userRoles->where('roles_id', 38)->first()->roles_id == 38)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="38">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 39)) > 0)
                                        @if ($userRoles->where('roles_id', 39)->first()->roles_id == 39)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="39">
                                    </td>

                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        الموظفين
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 40)) > 0)
                                        @if ($userRoles->where('roles_id', 40)->first()->roles_id == 40)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="40">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 41)) > 0)
                                        @if ($userRoles->where('roles_id', 41)->first()->roles_id == 41)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="41">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 42)) > 0)
                                        @if ($userRoles->where('roles_id', 42)->first()->roles_id == 42)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="42">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 43)) > 0)
                                        @if ($userRoles->where('roles_id', 43)->first()->roles_id == 43)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="43">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 44)) > 0)
                                        @if ($userRoles->where('roles_id', 44)->first()->roles_id == 44)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="44">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 45)) > 0)
                                        @if ($userRoles->where('roles_id', 45)->first()->roles_id == 45)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="45">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 46)) > 0)
                                        @if ($userRoles->where('roles_id', 46)->first()->roles_id == 46)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="46">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        الشركاء
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 47)) > 0)
                                        @if ($userRoles->where('roles_id', 47)->first()->roles_id == 47)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="47">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 48)) > 0)
                                        @if ($userRoles->where('roles_id', 48)->first()->roles_id == 48)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="48">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 49)) > 0)
                                        @if ($userRoles->where('roles_id', 49)->first()->roles_id == 49)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="49">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 50)) > 0)
                                        @if ($userRoles->where('roles_id', 50)->first()->roles_id == 50)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="50">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 51)) > 0)
                                        @if ($userRoles->where('roles_id', 51)->first()->roles_id == 51)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="51">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        المستخدمين
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 52)) > 0)
                                        @if ($userRoles->where('roles_id', 52)->first()->roles_id == 52)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="52">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 53)) > 0)
                                        @if ($userRoles->where('roles_id', 53)->first()->roles_id == 53)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="53">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 54)) > 0)
                                        @if ($userRoles->where('roles_id', 54)->first()->roles_id == 54)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="54">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 55)) > 0)
                                        @if ($userRoles->where('roles_id', 55)->first()->roles_id == 55)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="55">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 56)) > 0)
                                        @if ($userRoles->where('roles_id', 56)->first()->roles_id == 56)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="56">
                                    </td>
                                </tr>
                                <tr class="bg-purple">
                                    <td colspan="12">
                                        <center style="font-weight: bold;font-size: 14px">
                                            التقارير
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        الفواتير
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 57)) > 0)
                                        @if ($userRoles->where('roles_id', 57)->first()->roles_id == 57)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="57">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 78)) > 0)
                                        @if ($userRoles->where('roles_id', 78)->first()->roles_id == 78)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="78">
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 58)) > 0)
                                        @if ($userRoles->where('roles_id', 58)->first()->roles_id == 58)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="58">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 59)) > 0)
                                        @if ($userRoles->where('roles_id', 59)->first()->roles_id == 59)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="59">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        التحصيلات
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 60)) > 0)
                                        @if ($userRoles->where('roles_id', 60)->first()->roles_id == 60)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="60">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        الايداعات والمسحوبات
                                    </td>
                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 61)) > 0)
                                        @if ($userRoles->where('roles_id', 61)->first()->roles_id == 61)
                                            checked=""
                                        @endif
                                        @endif
                                        type="checkbox" name="roles_id[]" value="61">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        الشركاء
                                    </td>

                                    <td>
                                        <input @if (count($userRoles->where('roles_id', 62)) > 0)
                                        @if ($userRoles->where('roles_id', 62)->first()->roles_id == 62)
                                            checked=""
                                        @endif
                                        @endif

                                        type="checkbox" name="roles_id[]" value="62">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        حركات اليوم
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 73)) > 0)
                                                @if ($userRoles->where('roles_id', 73)->first()->roles_id == 73)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="73">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        سجل النشاطات
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 63)) > 0)
                                                @if ($userRoles->where('roles_id', 63)->first()->roles_id == 63)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="63">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr class="bg-warning" style="color: white !important">
                                    <td colspan="12">
                                        <center style="font-weight: bold;font-size: 14px">
                                            التقارير البيانيه
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        المخططات التفاعليه للمخزن
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 64)) > 0)
                                                @if ($userRoles->where('roles_id', 64)->first()->roles_id == 64)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="64">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        الرسم البياني للمخزن
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 65)) > 0)
                                                @if ($userRoles->where('roles_id', 65)->first()->roles_id == 65)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="65">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        الكشوفات المبسطه
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 66)) > 0)
                                                @if ($userRoles->where('roles_id', 66)->first()->roles_id == 66)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="66">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        العملاء
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 67)) > 0)
                                                @if ($userRoles->where('roles_id', 67)->first()->roles_id == 67)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="67">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr class="bg-teal">
                                    <td colspan="12">
                                        <center style="font-weight: bold;font-size: 14px">
                                            الاعدادات
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        نسخ احتياطي للبيانات
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 68)) > 0)
                                                @if ($userRoles->where('roles_id', 68)->first()->roles_id == 68)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="68">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        استرجاع البيانات
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 69)) > 0)
                                                @if ($userRoles->where('roles_id', 69)->first()->roles_id == 69)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="69">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        حذف الداتا بيز
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 70)) > 0)
                                                @if ($userRoles->where('roles_id', 70)->first()->roles_id == 70)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="70">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        اعادة ضبط المصنع
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 71)) > 0)
                                                @if ($userRoles->where('roles_id', 71)->first()->roles_id == 71)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="71">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        مسح الكاش
                                    </td>
                                    <td>
                                        <input
                                            @if (count($userRoles->where('roles_id', 72)) > 0)
                                                @if ($userRoles->where('roles_id', 72)->first()->roles_id == 72)
                                                    checked=""
                                                @endif
                                            @endif
                                        type="checkbox" name="roles_id[]" value="72">
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12">
                                        <input type="submit" value="تسجيل" class="btn btn-primary" style="width: 100%">
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
        $(document).ready(function() {
            $("input").keydown(function(e) {
                if (e.keyCode == 37) {
                    $(this).parent().next().find("input").focus();
                }
                if (e.keyCode == 39) {
                    $(this).parent().prev().find("input").focus();
                }
                if (e.keyCode == 38) {
                    var index = $(this).parent().index();
                    $(this).parent().parent().prev().children().eq(index).find("input").focus();
                }
                if (e.keyCode == 40) {
                    var index = $(this).parent().index();
                    $(this).parent().parent().next().children().eq(index).find("input").focus();
                }
            })
        });
    </script>
@endsection
