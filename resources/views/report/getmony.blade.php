@extends('layouts.app')
@section('title')
    التحصيلات
@endsection
@section('header-name')
    التحصيلات
@endsection
@section('header-link')
    <a href="{{ route('getmony.index') }}">التحصيلات</a>
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
                                sessionStorage.setItem("font-getmony", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-getmony') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-getmony') + "px");

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
                        <input type="text" id="search" class="form-control" placeholder="بحث...؟"><br>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped" style="width: 100% !important;">
                                <thead>
                                    <tr>
                                        <th>رقم التحصيل </th>
                                        <th>اسم العميل</th>
                                        <th>رصيد التحصيل</th>
                                        <th>تاريخ التحصيل</th>
                                        <th>منذ</th>
                                        <th>تمت بواسطة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $s)
                                        <tr>
                                            <td>
                                                {{ $s->id }}
                                            </td>
                                            <td>
                                                @foreach ( $supplier->where('id',$s->client_id) as $sup)
                                                    {{ $sup->name }} -> {{ $sup->type }}
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $s->mony }}
                                            </td>
                                            <td>
                                                {{$s->created_at }}
                                            </td>
                                            <td>
                                                {{$s->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                {{$s->whoadd }}
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
@section('script')
    <script>
        $(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tbody tr ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        })
    </script>
@endsection
