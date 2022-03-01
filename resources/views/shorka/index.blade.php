@extends('layouts.app')
@section('title')
    الشركاء
@endsection
@section('header-name')
    الشركاء
@endsection
@section('header-link')
    <a href="{{ route('shorka.index') }}">الشركاء</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 48)) > 0)
                    @if ($roles->where('roles_id', 48)->first()->roles_id == 48)

                        <div class="card-header">
                            <a href="{{ route('shorka.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-shorka", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-shorka') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-shorka') + "px");

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
                            <table class="table table-bordered table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الشريك</th>
                                        <th>النسبه</th>
                                        <th>المبلغ</th>
                                        @if (count($roles->where('roles_id', 49)) > 0)
                                            @if ($roles->where('roles_id', 49)->first()->roles_id == 49)

                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 51)) > 0)
                                            @if ($roles->where('roles_id', 51)->first()->roles_id == 51)

                                                <th>التفاصيل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 50)) > 0)
                                            @if ($roles->where('roles_id', 50)->first()->roles_id == 50)

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
                                                {{ $s->prec }} %
                                            </td>
                                            <td>
                                                {{ $s->amount }}
                                            </td>
                                            @if (count($roles->where('roles_id', 49)) > 0)
                                                @if ($roles->where('roles_id', 49)->first()->roles_id == 49)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('shorka.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 51)) > 0)
                                                @if ($roles->where('roles_id', 51)->first()->roles_id == 51)
                                                    <td>
                                                        <a title="تفاصيل" href="{{ route('shorka.show', $s->id) }}"
                                                            class="edit btn btn-info btn-xs ml-1">
                                                            <i class="fa fa-eye "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 50)) > 0)
                                                @if ($roles->where('roles_id', 50)->first()->roles_id == 50)
                                                    <td>
                                                        <form action="{{ route('shorka.destroy', $s->id) }}"
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
