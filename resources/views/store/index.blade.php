@extends('layouts.app')
@section('title')
    المخازن
@endsection
@section('header-name')
    المخازن
@endsection
@section('header-link')
    <a href="{{ route('store.index') }}">المخازن</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 22)) > 0)
                    @if ($roles->where('roles_id', 22)->first()->roles_id == 22)
                        <div class="card-header">
                            <a href="{{ route('store.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-store", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-store') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-store') + "px");

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
                                        <th>رقم المخازن </th>
                                        <th>اسم المخازن</th>
                                        {{-- <th>رصيد المخازن</th> --}}
                                        @if (count($roles->where('roles_id', 23)) > 0)
                                            @if ($roles->where('roles_id', 23)->first()->roles_id == 23)
                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 24)) > 0)
                                            @if ($roles->where('roles_id', 24)->first()->roles_id == 24)
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
                                            {{-- <td>
                                                @php
                                                    try {
                                                        echo $sum->where('store_id', $s->id)->sum('amount_all_plus');
                                                    } catch (\Throwable $th) {
                                                        echo 0;
                                                    }
                                                @endphp
                                            </td> --}}
                                            @if (count($roles->where('roles_id', 23)) > 0)
                                                @if ($roles->where('roles_id', 23)->first()->roles_id == 23)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('store.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 24)) > 0)
                                                @if ($roles->where('roles_id', 24)->first()->roles_id == 24)
                                                    <td>
                                                        <form action="{{ route('store.destroy', $s->id) }}" method="POST">
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
