@extends('layouts.app')
@section('title')
    المستخدمين
@endsection
@section('header-name')
    المستخدمين
@endsection
@section('header-link')
    <a href="{{ route('users.index') }}">المستخدمين</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 53)) > 0)
                    @if ($roles->where('roles_id', 53)->first()->roles_id == 53)
                        <div class="card-header">
                            <a href="{{ route('users.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-users", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-users') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-users') + "px");

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
                                        <th># </th>
                                        <th>الاسم</th>
                                        <th>اسم المستخدم</th>
                                        <th>المخزن</th>
                                        <th>الخزنه</th>
                                        {{-- <th>اضيف بواسطة</th> --}}
                                        @if (count($roles->where('roles_id', 54)) > 0)
                                            @if ($roles->where('roles_id', 54)->first()->roles_id == 54)
                                                <th>تعديل</th>
                                            @endif
                                        @endif


                                        @if (count($roles->where('roles_id', 55)) > 0)
                                            @if ($roles->where('roles_id', 55)->first()->roles_id == 55)
                                                <th>حذف</th>
                                            @endif
                                        @endif


                                        @if (count($roles->where('roles_id', 56)) > 0)
                                            @if ($roles->where('roles_id', 56)->first()->roles_id == 56)
                                                <th>صلاحيات</th>
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
                                                {{ $s->email != null ? $s->email : 'غير متاح' }}
                                            </td>

                                            <td>
                                                @if (count($store->where('id', $s->store_id)) == 0)
                                                    <span style="color: white;width: ;" class="btn btn-danger">
                                                        لا يوجد
                                                    </span>
                                                @else
                                                    @foreach ($store as $str)
                                                        @if ($str->id == $s->store_id)
                                                            {{ $str->name }}
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </td>
                                            <td>
                                                @if (count($bank->where('id', $s->bank_id)) == 0)
                                                    <span style="color: white;width: ;" class="btn btn-danger">
                                                        لا يوجد
                                                    </span>
                                                @else
                                                    @foreach ($bank as $ban)
                                                        @if ($ban->id == $s->store_id)
                                                            {{ $ban->name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            @if (count($roles->where('roles_id', 54)) > 0)
                                                @if ($roles->where('roles_id', 54)->first()->roles_id == 54)

                                                    <td>
                                                        <a title="تعديل" href="{{ route('users.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 55)) > 0)
                                                @if ($roles->where('roles_id', 55)->first()->roles_id == 55)

                                                    <td>
                                                        <form action="{{ route('users.destroy', $s->id) }}"
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
                                            @if (count($roles->where('roles_id', 56)) > 0)
                                                @if ($roles->where('roles_id', 56)->first()->roles_id == 56)

                                                    <td>
                                                        <a title="صلاحيات" style="color: white !important"
                                                            href="{{ route('roles.edit', $s->id) }}"
                                                            class="edit btn btn-warning btn-xs ml-1">
                                                            <i class="fa fa-mortar-pestle "></i>
                                                        </a>
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

@endsection
