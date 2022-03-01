@extends('layouts.app')
@section('title')
    الكشف الشامل للمخزن
@endsection
@section('header-name')
    الكشف الشامل للمخزن
@endsection
@section('header-link')
    <a href="{{ route('collection.index') }}">الكشف الشامل للمخزن</a>
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
                                sessionStorage.setItem("font-collection", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-collection') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-collection') + "px");

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
                                <tr style="color:white">

                                    <th style="background: rgb(150, 54, 52);" colspan="23">
                                        <center>
                                            <h5>بيانات النشر والصرف</h5>
                                        </center>
                                    </th>

                                </tr>
                                <tr>
                                    <th>عدد بلوكات النشر</th>
                                    <th>تاريخ النشر</th>
                                    <th>رقم الماكينه</th>
                                    <th>سمك الالماظ</th>
                                    <th>سمك النشر</th>
                                    <th>اجمالي السمك </th>
                                    <th>عدد المسحات </th>
                                    <th>عدد الطاولات </th>
                                    <th>طول</th>
                                    <th>عرض</th>
                                    <th>ارتفاع</th>
                                    <th>صافي م3</th>
                                    <th>السعر</th>
                                    <th>قيمة ال م3</th>
                                    <th>سعر المسحه</th>
                                    <th>قيمة المسحه</th>
                                    <th>اكراميه</th>
                                    <th>اجمالي القيمه</th>
                                    <th>تكلفة النقل</th>
                                    <th>اجمالي التكلفه</th>
                                    <th>صافي م2</th>
                                    <th>تكلفة م2 بعد الكشف الشامل للمخزن</th>
                                    <th>تفاصيل الصرف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publisher as $s)
                                    <tr>

                                        <td>
                                            {{ $s->qty_publish }}
                                        </td>
                                        <td>
                                            {{ $s->date }}
                                        </td>

                                        <td>
                                            {{ $s->number_makina }}
                                        </td>

                                        <td>
                                            {{ $s->volum_almaza }}
                                        </td>
                                        <td>
                                            {{ $s->volum_publish }}
                                        </td>
                                        <td>
                                            {{ $s->volum_amount }}
                                        </td>
                                        <td>
                                            {{ $s->number_smears }}
                                        </td>
                                        <td>
                                            {{ $s->number_tables }}
                                        </td>

                                        <td>
                                            {{ $s->height }}
                                        </td>
                                        <td>
                                            {{ $s->width }}
                                        </td>
                                        <td>
                                            {{ $s->volum }}
                                        </td>
                                        <td>
                                            {{ $s->safy }}
                                        </td>
                                        <td>
                                            {{ $s->price }}
                                        </td>
                                        <td>
                                            {{ $s->amount }}
                                        </td>
                                        <td>
                                            {{ $s->price_mears }}
                                        </td>

                                        <td>
                                            {{ $s->amount_mears }}
                                        </td>
                                        <td>
                                            {{ $s->tip }}
                                        </td>
                                        <td>
                                            {{ $s->amount_all }}
                                        </td>
                                        <td>
                                            {{ $s->price_charge }}
                                        </td>
                                        <td>
                                            {{ $s->amount_all_plus }}
                                        </td>
                                        <td>
                                            {{ $s->safym2 }}
                                        </td>
                                        <td>
                                            {{ $s->amount_with_safym2 }}
                                        </td>
                                        <td>
                                            <a target="_blank" title="تفاصيل"
                                                href="{{ route('collection.show', $s->id) }}"
                                                class="details btn btn-warning btn-xs ml-1" style="color: white !important">
                                                <i class="fas fa-eye" style="color: white !important""></i>
                                            </a>
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
