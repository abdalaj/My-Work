@extends('layouts.app')
@section('title')
    العملات
@endsection
@section('header-name')
    العملات
@endsection
@section('header-link')
    <a href="{{ route('currencies.index') }}">العملات</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 31)) > 0)
                    @if ($roles->where('roles_id', 31)->first()->roles_id == 31)
                        <div class="card-header">
                            <a href="{{ route('currencies.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-currencies", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-currencies') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-currencies') + "px");

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
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>الكود</th>
                                        <th>الرمز</th>
                                        <th>الفورمات</th>
                                        <th>سعر الصرف</th>
                                        <th>الحاله</th>
                                        @if (count($roles->where('roles_id', 32)) > 0)
                                            @if ($roles->where('roles_id', 32)->first()->roles_id == 32)
                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 33)) > 0)
                                            @if ($roles->where('roles_id', 33)->first()->roles_id == 33)
                                                <th class="no-sort">حذف</th>
                                            @endif
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($currencies as $key => $currency)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $currency['name'] }}</td>
                                            <td>{{ $currency['code'] }}</td>
                                            <td>{{ $currency['symbol'] }}</td>
                                            <td>{{ $currency['format'] }}</td>
                                            <td>{{ 1 / $currency['exchange_rate'] }}</td>
                                            <td>
                                                @if ($currency['active'] == 1)
                                                    <span class="badge bg-success p-2">
                                                        نشط
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger p-2">
                                                        غير نشط
                                                    </span>

                                                @endif
                                            </td>
                                            @if (count($roles->where('roles_id', 32)) > 0)
                                                @if ($roles->where('roles_id', 32)->first()->roles_id == 32)
                                                    <td>
                                                        <a title="تعديل"
                                                            href="{{ route('currencies.edit', $currency['id']) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 33)) > 0)
                                                @if ($roles->where('roles_id', 33)->first()->roles_id == 33)
                                                    <td>
                                                        <form action="{{ route('currencies.destroy', $currency['id']) }}"
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

@endsection
