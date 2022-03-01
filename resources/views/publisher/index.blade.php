@extends('layouts.app')
@section('title')
    النشر
@endsection
@section('header-name')
    النشر
@endsection
@section('header-link')
    <a href="{{ route('publisher.index') }}">النشر</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 6)) > 0)
                    @if ($roles->where('roles_id', 6)->first()->roles_id == 6)
                        <div class="card-header">
                            <a href="{{ route('publisher.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-publisher", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-publisher') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-publisher') + "px");

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

                                    <th style="background: rgb(150, 54, 52);" colspan="29">
                                        <center>
                                            <h5>بيانات النشر والصرف</h5>
                                        </center>
                                    </th>

                                </tr>
                                <tr>
                                    <th>رقم الاذن</th>
                                    <th>البيان</th>
                                    <th>رقم المصنع</th>
                                    <th>اسم العميل</th>
                                    <th>عدد بلوكات النشر</th>
                                    <th>تاريخ النشر</th>
                                    <th>رقم الماكينه</th>
                                    <th>سمك الالماظ</th>
                                    <th>سمك النشر </th>
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
                                    <th>تكلفة م2 بعد النشر</th>
                                    <th>اسم المخزن</th>
                                    @if (count($roles->where('roles_id', 7)) > 0)
                                        @if ($roles->where('roles_id', 7)->first()->roles_id == 7)
                                            <th>تعديل</th>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 8)) > 0)
                                        @if ($roles->where('roles_id', 8)->first()->roles_id == 8)
                                            <th>حذف</th>
                                        @endif
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @foreach ($item->publisher as $s)
                                        <tr>
                                            <td>
                                                {{ $s->id }}
                                            </td>
                                            <td>
                                                {{ $s->name }}
                                            </td>
                                            <td>
                                                @if (count($important) > 0)
                                                    @foreach ($important as $imp)
                                                        @if ($imp->id == $s->important_id)
                                                            {{ $imp->number_factory }} {{ $imp->number_herfy }}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    لا يوجد
                                                @endif

                                            </td>
                                            <td>
                                                @if (count($client->where('id', $s->name_client)) == 0)
                                                    <span style="color: white;width: ;" class="btn btn-danger">
                                                        لا يوجد
                                                    </span>
                                                @else
                                                    @foreach ($client->where('id', $s->name_client) as $sup)
                                                        {{ $sup->name }}
                                                    @endforeach
                                                @endif
                                            </td>
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
                                                @if (count($item->where('id', $s->store_id)->get('name')) == 0)
                                                    <span style="color: white;width: ;" class="btn btn-danger">
                                                        لا يوجد
                                                    </span>
                                                @endif
                                                @foreach ($item->where('id', $s->store_id)->get('name') as $item)
                                                    {{ $item->name }}
                                                @endforeach
                                            </td>
                                            @if (count($roles->where('roles_id', 7)) > 0)
                                                @if ($roles->where('roles_id', 7)->first()->roles_id == 7)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('publisher.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 8)) > 0)
                                                @if ($roles->where('roles_id', 8)->first()->roles_id == 8)
                                                    <td>
                                                        <form action="{{ route('publisher.destroy', $s->id) }}"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
