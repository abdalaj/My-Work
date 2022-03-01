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
                @if (count($roles->where('roles_id', 10)) > 0)
                    @if ($roles->where('roles_id', 10)->first()->roles_id == 10)
                        <div class="card-header">
                            <a href="{{ route('exporter.create') }}" class="btn bg-success" style="color: white">
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
                                    <th style="background: rgb(255, 180, 10);color: white" colspan="27">
                                        <center>
                                            <h5>بيانات التصنيع والتحميل</h5>
                                        </center>
                                    </th>
                                </tr>
                                <tr>
                                    <th> رقم البيان </th>
                                    <th>البيان</th>
                                    <th>اسم العميل</th>
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
                                    <th>اسم المخزن</th>
                                    <th>مرتجع</th>
                                    @if (count($roles->where('roles_id', 11)) > 0)
                                        @if ($roles->where('roles_id', 11)->first()->roles_id == 11)
                                            <th>تعديل</th>
                                        @endif
                                    @endif
                                    @if (count($roles->where('roles_id', 12)) > 0)
                                        @if ($roles->where('roles_id', 12)->first()->roles_id == 12)
                                            <th>حذف</th>
                                        @endif
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @foreach ($item->exporter as $s)
                                        <tr>
                                            <td>
                                                {{ $s->id }}
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

                                            @if (count($roles->where('roles_id', 11)) > 0)
                                                @if ($roles->where('roles_id', 11)->first()->roles_id == 11)

                                                    <td>
                                                        <a title="تعديل" href="{{ route('exporter.edit', $s->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 12)) > 0)

                                                @if ($roles->where('roles_id', 12)->first()->roles_id == 12)
                                                    <td>
                                                        <form action="{{ route('exporter.destroy', $s->id) }}"
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
