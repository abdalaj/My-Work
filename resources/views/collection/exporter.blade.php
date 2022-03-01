@extends('layouts.app')
@section('title')
    التصنيع والتحميل
@endsection
@section('header-name')
    التصنيع والتحميل
@endsection
@section('header-link')
    <a href="{{ route('exporter.index') }}">التصنيع والتحميل</a>
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
                                sessionStorage.setItem("font-exporter", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-exporter') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-exporter') + "px");

                        })
                    </script>

                    حجم الخط
                    <select class="font" style="width: 100%">
                        @for ($i = 0; $i <= 100; $i += 2)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @endfor
                    </select>
                    <div class="card-body " style="width:100%;overflow-x: auto">
                        <table id="example" class="display" style="width:100%;overflow-x: auto">
                            <thead>
                                <tr>
                                    <th style="background: rgb(255, 180, 10);color: white" colspan="21">
                                        <center>
                                            <h5>بيانات التصنيع والتحميل</h5>
                                        </center>
                                    </th>
                                </tr>
                                <tr>
                                    {{-- <th>البيان</th> --}}
                                    <th>تاريخ التصنيع</th>
                                    <th>كود الطلبيه</th>
                                    <th>الوصف</th>
                                    <th>العدد</th>
                                    <th>طول</th>
                                    <th>ارتفاع</th>
                                    <th>صافي م2</th>
                                    <th>سعر البيع</th>
                                    <th>التكلفه</th>
                                    <th>عدد طاولات الرفض</th>
                                    <th>اجمالي كميه الرفض</th>
                                    <th>اجمالي قيمة الرفض</th>
                                    <th>المتبقي من الطاولات</th>
                                    <th>اجمالي الكميه المتبقيه</th>
                                    <th>اجمالي قيمة المتبقي</th>
                                    <th>الفرق بين الشراء والنشر قبل الخصم م3</th>
                                    <th>الفرق بين الشراء والنشر بعد الخصم م3</th>
                                    <th>الفرق بين النشر والتصنيع / التحميل م2</th>
                                    <th>صافي ربح البلوك</th>
                                    <th>رقم الحاويه</th>
                                    <th>مرتجع</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exporter as $s)
                                    <tr>

                                        {{-- <td>
                                            {{ $s->name }}
                                        </td> --}}

                                        <td>
                                            {{ $s->date }}
                                        </td>
                                        <td>
                                            {{ $s->code }}
                                        </td>
                                        <td>
                                            {{ $s->describ }}
                                        </td>
                                        <td>
                                            {{ $s->qty }}
                                        </td>
                                        <td>
                                            {{ $s->height }}
                                        </td>

                                        <td>
                                            {{ $s->volum }}
                                        </td>
                                        <td>
                                            {{ $s->safym2 }}
                                        </td>
                                        <td>
                                            {{ $s->price }}
                                        </td>
                                        <td>
                                            {{ $s->amount }}
                                        </td>
                                        <td>
                                            {{ $s->qty_refuse }}
                                        </td>
                                        <td>
                                            {{ $s->allqty_refuse }}
                                        </td>

                                        <td>
                                            {{ $s->amount_refuse }}
                                        </td>
                                        <td>
                                            {{ $s->qty_found }}
                                        </td>
                                        <td>
                                            {{ $s->qtyall_found }}
                                        </td>
                                        <td>
                                            {{ $s->amount_found }}
                                        </td>
                                        <td>
                                            {{ $s->import_miuns_publish_befor_discount }}
                                        </td>
                                        <td>
                                            {{ $s->import_miuns_publish_after_discount }}
                                        </td>
                                        <td>
                                            {{ $s->import_miuns_export }}
                                        </td>
                                        <td>
                                            {{ $s->god }}
                                        </td>
                                        <td>
                                            {{ $s->number_hawya }}
                                        </td>
                                        <td>
                                            @if ($s->is_return == 0)
                                                <button class=" btn btn-danger btn-xs ml-1">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            @else
                                                <button class=" btn btn-success btn-xs ml-1">
                                                    <i class="fas fa-check "></i>
                                                </button>
                                            @endif
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

@endsection
