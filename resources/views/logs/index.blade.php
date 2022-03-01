@extends('layouts.app')
@section('title')
    سجل النشاطات
@endsection
@section('header-name')
    سجل النشاطات
@endsection
@section('header-link')
    <a href="{{ route('logs.index') }}">سجل النشاطات</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">

                <div class="p-4">
                    <script>
                        $(function() {
                            $(".font").change(function() {
                                var font = $(".font option:selected").val();
                                sessionStorage.setItem("font-logs", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-logs') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-logs') + "px");

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
                                        <th>اسم القائم علي هذه العمليه</th>
                                        <th>البيان</th>
                                        <th>نوع العمليه</th>
                                        <th>التاريخ</th>
                                        <th>منذ </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $logs)
                                        <tr>
                                            <td>
                                                {{ $logs->id }}
                                            </td>
                                            <td>
                                                {{ $logs->user }}
                                            </td>
                                            <td>
                                                {{ $logs->name }}
                                            </td>
                                            <td>
                                                {{ $logs->type }}
                                            </td>
                                            <td>
                                                {{ $logs->created_at }}
                                            </td>
                                            <td>
                                                {{ $logs->created_at->diffForHumans() }}
                                            </td>
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
