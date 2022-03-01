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

                                    <th style="background: rgb(99, 37, 35);" colspan="18">
                                        <center>
                                            <h5>بيانات التوريد</h5>
                                        </center>
                                    </th>

                                </tr>
                                <tr>
                                    <th>رقم الاذن</th>
                                    <th>الررقم الحرفي</th>
                                    <th>رقم المصنع</th>
                                    <th>اسم الخامه</th>
                                    <th>رقم العميل </th>
                                    <th>اسم العميل</th>
                                    <th>تاريخ التوريد</th>
                                    <th>عدد البلوكات</th>
                                    <th>طول</th>
                                    <th>عرض</th>
                                    <th>ارتفاع</th>
                                    <th>صافي م3</th>
                                    <th>نسبة الخصم</th>
                                    <th>الصافي بعد الخصم</th>
                                    <th>سعر المتر</th>
                                    <th>التكلفه</th>
                                    <th>مرتجع</th>
                                    <th>تفاصيل النشر</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $data)
                                    <tr>
                                        <td>رقم الاذن</td>
                                        <td>
                                            {{ $data->number_herfy }}
                                        </td>
                                        <td>
                                            {{ $data->number_factory }}
                                        </td>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td>
                                            {{ $data->name_client }}
                                        </td>
                                        <td>
                                            @if (count($supplier->where('id', $data->name_client)) == 0)
                                                <span style="color: white;width: ;" class="btn btn-danger">
                                                    لا يوجد
                                                </span>
                                            @else
                                                @foreach ($supplier->where('id', $data->name_client) as $sup)
                                                    {{ $sup->name }}
                                                @endforeach
                                            @endif

                                        </td>
                                        <td>{{ $data->date }}</td>
                                        <td>
                                            {{ $data->qty }}
                                        </td>
                                        <td>{{ $data->height }}</td>
                                        <td>{{ $data->width }}</td>
                                        <td>{{ $data->volum }}</td>
                                        <td>{{ $data->safy }}</td>
                                        <td>{{ $data->discount }}</td>
                                        <td>{{ $data->safy_after }}</td>
                                        <td>{{ $data->price }}</td>
                                        <td>{{ $data->amount }}</td>
                                        <td>
                                            @if ($data->is_return == 0)
                                                <button class=" btn btn-danger btn-xs ml-1">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            @else
                                                <button class=" btn btn-success btn-xs ml-1">
                                                    <i class="fas fa-check "></i>
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            <a target="_blank" title="تفاصيل"
                                                href="{{ route('collection.edit', $data->id) }}"
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
