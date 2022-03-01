@extends('layouts.app')
@section('title')
    تقرير الشركاء
@endsection
@section('header-name')
    تقرير الشركاء
@endsection
@section('header-link')
    <a href="">تقرير الشركاء</a>
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
                                sessionStorage.setItem("font-shorkareport", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-shorkareport') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-shorkareport') + "px");

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
                            <table class="table table-bordered " style="width: 100% !important;">
                                <thead>
                                    <tr style="text-align: center !important">
                                        <th>اجمالي الربح</th>
                                        <th>مصروفات عامه</th>
                                        <th>صافي الربح</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center !important;">
                                    <tr>
                                        <td class="bg-green rowTd" style="vertical-align: middle !important"
                                            rowspan="{{ count($data) }}">
                                            {{ $god }}
                                        </td>
                                        <td class="bg-red rowTd" style="vertical-align: middle !important"
                                            rowspan="{{ count($data) }}">
                                            {{ $expences }}
                                        </td>
                                        <td class="bg-primary rowTd" style="vertical-align: middle !important"
                                            rowspan="{{ count($data) }}">
                                            {{ $god - $expences }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered " style="width: 100% !important;">
                                <thead style="text-align: center !important">
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الشريك</th>
                                        <th>النسبه</th>
                                        <th>مسحوبات الشركاء</th>
                                        <th>ربح الشريك </th>
                                        <th>صافي الربح</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center !important;">
                                    @foreach ($data as $shorka)
                                        <tr>
                                            <td>
                                                {{ $shorka->id }}
                                            </td>
                                            <td>
                                                {{ $shorka->name }}
                                            </td>
                                            <td>
                                                {{ $shorka->prec }} %
                                            </td>
                                            <td class="bg-warning" style="color: white !important">
                                                {{ $expences_ty->where('prushes_type', $shorka->id)->sum('mony') }}
                                            </td>
                                            <td class="bg-info">
                                                {{ (($god - $expences) * $shorka->prec) / 100 }}

                                            </td>
                                            <td class="bg-success">
                                                @if (((($god - $expences)*$shorka->prec)/100) -
                                                $expences_ty->where('prushes_type',$shorka->id)->sum('mony') < 0)
                                                    {{ abs((($god - $expences) * $shorka->prec) / 100 - $expences_ty->where('prushes_type', $shorka->id)->sum('mony')) }}
                                                ( خساره ) @else
                                                    {{ abs((($god - $expences) * $shorka->prec) / 100 - $expences_ty->where('prushes_type', $shorka->id)->sum('mony')) }}
                                                    ( ربح ) @endif
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
