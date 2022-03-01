@extends('layouts.app')
@section('title')
    الهالكات
@endsection
@section('header-name')
    الهالكات
@endsection
@section('header-link')
    <a href="{{ route('expire.index') }}">الهالكات</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 80)) > 0)
                    @if ($roles->where('roles_id', 80)->first()->roles_id == 80)

                        <div class="card-header">
                            <a href="{{ route('expire.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-expire", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-expire') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-expire') + "px");

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
                                        <th>البيان </th>
                                        <th>المبلغ</th>
                                        <th>المخزن</th>
                                        <th>التاريخ</th>
                                        @if (count($roles->where('roles_id', 81)) > 0)
                                            @if ($roles->where('roles_id', 81)->first()->roles_id == 81)
                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 82)) > 0)
                                            @if ($roles->where('roles_id', 82)->first()->roles_id == 82)
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
                                                {{ $s->price }}
                                            </td>
                                            <td>
                                                {{ $s->store }}
                                            </td>
                                            <td>
                                                {{ $s->date }}
                                            </td>
                                            @if (count($roles->where('roles_id', 81)) > 0)
                                                @if ($roles->where('roles_id', 81)->first()->roles_id == 81)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('expire.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif

                                            @if (count($roles->where('roles_id', 82)) > 0)
                                                @if ($roles->where('roles_id', 82)->first()->roles_id == 82)
                                                    <td>
                                                        <form action="{{ route('expire.destroy', $s->id) }}"
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
