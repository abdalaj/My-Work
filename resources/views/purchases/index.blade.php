@extends('layouts.app')
@section('title')
    المشتريات
@endsection
@section('header-name')
    المشتريات
@endsection
@section('header-link')
    <a href="{{ route('purchases.index') }}">المشتريات</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 75)) > 0)
                    @if ($roles->where('roles_id', 75)->first()->roles_id == 75)
                        <div class="card-header">
                            <a href="{{ route('purchases.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-purchases", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-purchases') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-purchases') + "px");

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
                                        <th>البيان</th>
                                        <th>الكميه</th>
                                        <th>السعر</th>
                                        <th>الاجمالي</th>
                                        <th>الوصف</th>
                                        <th>التاريخ</th>
                                        <th>مرتجع</th>
                                        @if (count($roles->where('roles_id', 76)) > 0)
                                            @if ($roles->where('roles_id', 76)->first()->roles_id == 76)
                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 77)) > 0)
                                            @if ($roles->where('roles_id', 77)->first()->roles_id == 77)
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
                                                {{ $s->qty }}
                                            </td>
                                            <td>
                                                {{ $s->price }}
                                            </td>
                                            <td>
                                                {{ $s->price * $s->qty  }}
                                            </td>
                                            <td>
                                                {{ $s->describe }}
                                            </td>
                                            <td>
                                                {{ $s->date }}
                                            </td>
                                             <td>
                                                @if ($s->is_return == 0)
                                                    <button
                                                        class=" btn btn-danger btn-xs ml-1">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                @else
                                                    <button
                                                        class=" btn btn-success btn-xs ml-1">
                                                        <i class="fas fa-check "></i>
                                                    </button>
                                                @endif
                                            </td>
                                            @if (count($roles->where('roles_id', 76)) > 0)
                                                @if ($roles->where('roles_id', 76)->first()->roles_id == 76)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('purchases.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 77)) > 0)
                                                @if ($roles->where('roles_id', 77)->first()->roles_id == 77)
                                                    <td>
                                                        <form action="{{ route('purchases.destroy', $s->id) }}"
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
