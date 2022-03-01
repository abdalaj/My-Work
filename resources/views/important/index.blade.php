@extends('layouts.app')
@section('title')
    الواردات
@endsection
@section('header-name')
    الواردات
@endsection
@section('header-link')
    <a href="{{ route('important.index') }}">الواردات</a>
@endsection
@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    {{-- {{ $permisson }} --}}
    <div class="row">
        <div class="col-12">
            <div class="card ">
                @if (count($roles->where('roles_id', 2)) > 0)
                    @if ($roles->where('roles_id', 2)->first()->roles_id == 2)
                        <div class="card-header">
                            <a href="{{ route('important.create') }}" class="btn bg-success" style="color: white">
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
                                sessionStorage.setItem("font-important", font);
                                $("table,td,th").css("font-size", sessionStorage.getItem('font-important') + "px");
                            });
                            $("table,td,th").css("font-size", sessionStorage.getItem('font-important') + "px");

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

                                    <th style="background: rgb(99, 37, 35);" colspan="23">
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
                                    <th>تاريخ التوريد</th>
                                    <th>اسم العميل</th>
                                    <th>عدد البلوكات</th>
                                    <th>طول</th>
                                    <th>عرض</th>
                                    <th>ارتفاع</th>
                                    <th>صافي م3</th>
                                    <th>نسبة الخصم</th>
                                    <th>الصافي بعد الخصم</th>
                                    <th>سعر المتر</th>
                                    <th>التكلفه</th>
                                    <th>اسم المخزن</th>
                                    <th>مرتجع</th>
                                    @if (count($roles->where('roles_id', 3)) > 0)
                                        @if ($roles->where('roles_id', 3)->first()->roles_id == 3)
                                            <th>تعديل</th>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 4)) > 0)
                                        @if ($roles->where('roles_id', 4)->first()->roles_id == 4)
                                            <th>حذف</th>
                                        @endif
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @foreach ($item->important as $s)
                                        <tr>
                                            <td>
                                                {{ $s->id }}
                                            </td>
                                            <td>
                                                {{ $s->number_herfy }}
                                            </td>
                                            <td>
                                                {{ $s->number_factory }}
                                            </td>
                                            <td>
                                                {{ $s->name }}
                                            </td>
                                            <td>
                                                {{ $s->name_client }}
                                            </td>
                                            <td>
                                                {{ $s->date }}
                                            </td>
                                            <td>
                                                @if (count($supplier->where('id', $s->name_client)) == 0)
                                                    <span style="color: white;width: ;" class="btn btn-danger">
                                                        لا يوجد
                                                    </span>
                                                @else
                                                    @foreach ($supplier->where('id', $s->name_client) as $sup)
                                                        {{ $sup->name }}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                {{ $s->qty }}
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
                                                {{ $s->discount }}
                                            </td>
                                            <td>
                                                {{ $s->safy_after }}
                                            </td>
                                            <td>
                                                {{ $s->price }}
                                            </td>
                                            <td>
                                                {{ $s->amount }}
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
                                            <td>
                                                @if ($s->is_return == 0)
                                                    <button
                                                        class=" btn btn-danger btn-xs ml-1">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                @else
                                                    <button
                                                        class=" btn btn-success btn-xs ml-1">
                                                        <i class="fas fa-check "></i>
                                                    </button>
                                                @endif
                                            </td>
                                            @if (count($roles->where('roles_id', 3)) > 0)
                                                @if ($roles->where('roles_id', 3)->first()->roles_id == 3)
                                                    <td>
                                                        <a title="تعديل" href="{{ route('important.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>

                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 4)) > 0)
                                                @if ($roles->where('roles_id', 4)->first()->roles_id == 4)
                                                    <td>
                                                        <form action="{{ route('important.destroy', $s->id) }}"
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
