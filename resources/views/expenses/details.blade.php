@extends('layouts.app')
@foreach ($data as $item)
    @section('title')
    المصروفات | {{ $prushes->find($item->prushes_id)->name }}
    @endsection
    @section('header-name')
    المصروفات | {{ $prushes->find($item->prushes_id)->name }}
    @endsection
    @section('header-link')
    <a href="">المصروفات | {{ $prushes->find($item->prushes_id)->name }}</a>
    @endsection
    @endforeach
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
                                sessionStorage.setItem("font-expences", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-expences') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-expences') + "px");

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
                                        <th>البيان </th>
                                        <th>اسم المصروف</th>
                                        <th>نوع المصروف</th>
                                        <th>مبلغ المصروف</th>
                                        <th>اسم الخزينه</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $ex)
                                        <tr>
                                            <td>
                                                {{ $ex->id }}
                                            </td>
                                            <td>
                                                {{ $ex->name }}
                                            </td>
                                            <td>
                                                {{ $prushes->find($ex->prushes_id)->name }}
                                            </td>
                                            <td>
                                                @if ($ex->prushes_type == 0)
                                                    مصروف عام
                                                @else
                                                    {{ $shorka->find($ex->prushes_type)->name }}
                                                @endif

                                            </td>
                                            <td class="values">
                                                {{ $ex->mony }}
                                            </td>
                                            <td>
                                                {{ $bank->find($ex->bank_id)->name  }}
                                            </td>
                                            <td>
                                                {{ $ex->date }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <footer >
                                    <tr style="background: #337ab7;color: white">
                                        <td colspan="4">
                                            الاجمالي
                                        </td>
                                        <td colspan="1" id="values">

                                        </td>
                                        <td colspan="2" >

                                        </td>
                                    </tr>
                                </footer>
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
            var total = 0;
            $(".values").each(function(){
                amount = parseFloat($(this).text()).toFixed(2) - 0;
                total += amount;
                $("#values").text(total);
            })
        })
    </script>
@endsection
