@extends('layouts.app')
@section('title')
    تفاصيل فاتورة
@endsection
@section('header-name')
    تفاصيل فاتورة
@endsection
@section('header-link')
    <a href="">تفاصيل فاتورة</a>
@endsection

@section('content')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    <div class="row">
        <div class="col-12">
            <div class="card ">

                <div class="p-4">
                    <div class="card-body " style="width:100%;overflow-x: auto">
                        @if (isset($imp))
                            <table id="example" class="display" style="width:100%;overflow-x: auto">
                                <thead>
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
                                    @foreach ($imp as $s)
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
                                                    <span style="color: white;width: ;" class="bg-danger p-1">
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
                                                {{-- @if (count($store->where('id', $s->store_id)->get('name')) == 0)
                                                <span style="color: white;width: ;" class="bg-danger p-1">
                                                لا يوجد
                                                </span>
                                            @endif --}}
                                                @foreach ($store as $stor)
                                                    @if ($stor->id == $s->store_id)
                                                        {{ $stor->name }}
                                                    @endif
                                                @endforeach
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
                                </tbody>
                            </table>
                        @elseif (isset($pub))
                            <table id="example" class="display" style="width:100%;overflow-x: auto">
                                <thead>
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
                                    @foreach ($pub as $s)
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
                                                @if (count($supplier->where('id', $s->name_client)) == 0)
                                                    <span style="color: white;width: ;" class="bg-danger p-1">
                                                        لا يوجد
                                                    </span>
                                                @else
                                                    @foreach ($supplier->where('id', $s->name_client) as $sup)
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
                                                @foreach ($store as $item)
                                                    @if (count($item->where('id', $s->store_id)->get('name')) == 0)
                                                        <span style="color: white;width: ;" class="bg-danger p-1">
                                                            لا يوجد
                                                        </span>
                                                    @endif
                                                    @foreach ($item->where('id', $s->store_id)->get('name') as $item)
                                                        {{ $item->name }}
                                                    @endforeach
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
                                </tbody>
                            </table>

                        @elseif (isset($purchases))
                            <table id="example" style="width:100% !important;overflow-x: auto;border:1px solid #000;">
                                <thead>
                                    <tr>
                                        <th>رقم الاذن</th>
                                        <th>البيان</th>
                                        <th>اسم المورد</th>
                                        <th>السعر</th>
                                        <th>الكميه</th>
                                        <th>الاجمالي </th>
                                        <th>التاريخ </th>
                                        <th>مرتجع </th>
                                        @if (count($roles->where('roles_id', 76)) > 0)
                                            @if ($roles->where('roles_id', 76)->first()->roles_id == 76)
                                                <th>تعديل</th>
                                            @endif
                                        @endif
                                        @if (count($roles->where('roles_id', 77)) > 0)
                                            @if ($roles->where('roles_id', 77)->first()->roles_id == 77)
                                                <th>حذف</th>
                                            @endif
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchas)
                                        <tr>
                                            <td>
                                                {{ $purchas->id }}
                                            </td>
                                            <td>
                                                {{ $purchas->name }}
                                            </td>

                                            <td>
                                                @if (count($supplier->where('id', $purchas->client_id)) == 0)
                                                    <span style="color: white;width: ;" class="bg-danger p-1">
                                                        لا يوجد
                                                    </span>
                                                @else
                                                    @foreach ($supplier->where('id', $purchas->client_id) as $sup)
                                                        {{ $sup->name }}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                {{ $purchas->qty }}
                                            </td>

                                            <td>
                                                {{ $purchas->price }}
                                            </td>
                                            <td>
                                                {{ $purchas->qty * $purchas->price }}
                                            </td>
                                            <td>
                                                {{ $purchas->date }}
                                            </td>
                                            <td>
                                                @if ($purchas->is_return == 0)
                                                    <button class=" btn btn-danger btn-xs ml-1">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                @else
                                                    <button class=" btn btn-success btn-xs ml-1">
                                                        <i class="fas fa-check "></i>
                                                    </button>
                                                @endif
                                            </td>
                                            @if (count($roles->where('roles_id', 76)) > 0)
                                                @if ($roles->where('roles_id', 76)->first()->roles_id == 76)
                                                    <td>
                                                        <a title="تعديل"
                                                            href="{{ route('purchases.edit', $purchas->id) }}"
                                                            class="edit btn btn-primary btn-xs ml-1">
                                                            <i class="fa fa-edit "></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endif
                                            @if (count($roles->where('roles_id', 77)) > 0)
                                                @if ($roles->where('roles_id', 77)->first()->roles_id == 77)
                                                    <td>
                                                        <form action="{{ route('purchases.destroy', $purchas->id) }}"
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
                                </tbody>
                            </table>
                        @else
                            <table id="example" class="display" style="width:100%;overflow-x: auto">
                                <thead>
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
                                    @foreach ($exp as $s)
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
                                                @foreach ($store as $item)
                                                    @if (count($item->where('id', $s->store_id)->get('name')) == 0)
                                                        <span style="color: white;width: ;" class="bg-danger p-1">
                                                            لا يوجد
                                                        </span>
                                                    @endif
                                                    @foreach ($item->where('id', $s->store_id)->get('name') as $item)
                                                        {{ $item->name }}
                                                    @endforeach
                                                @endforeach
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
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
