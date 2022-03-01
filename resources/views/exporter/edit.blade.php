@extends('layouts.app')
@section('title')
    تعديل فاتورة تصنيع وتحميل
@endsection
@section('header-link')
    <a href=""> تعديل فاتورة تصنيع وتحميل</a> / التصنيع والتحميلات
@endsection
@section('header-name')
    تعديل فاتورة تصنيع وتحميل
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل فاتوره</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    @foreach ($exporter as $item)
                        <form action="{{ route('exporter.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <input type="hidden" name="order_id" value="{{ $item->order_id }}">
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> البيان</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control "
                                        required placeholder="البيان">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> كود الطلبيه</label>
                                    <input type="text" name="code" value="{{ $item->code }}" class="form-control "
                                        required placeholder="كود الطلبيه">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الوصف</label>
                                    <input type="text" name="describ" value="{{ $item->describ }}" class="form-control "
                                        required placeholder="الوصف">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> العدد</label>
                                    <input type="text" name="qty" value="{{ $item->qty }}" class="form-control "
                                        required placeholder="العدد">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> صافي م2</label>
                                    <input type="text" name="safym2" value="{{ $item->safym2 }}" class="form-control "
                                        required placeholder="صافي م2">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اسم العميل</label>
                                    <select name="name_client" class="form-control">
                                        @foreach ($client as $cli)
                                            <option value="{{ $cli->name }}">{{ $cli->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الطول</label>
                                    <input type="text" name="height" value="{{ $item->height }}" class="form-control "
                                        required placeholder="الطول">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الارتفاع</label>
                                    <input type="text" name="volum" value="{{ $item->volum }}" class="form-control "
                                        required placeholder="الارتفاع">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> السعر</label>
                                    <input type="text" name="price" value="{{ $item->price }}" class="form-control "
                                        required placeholder="السعر">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label">التكلفه</label>
                                    <input type="text" name="amount" value="{{ $item->amount }}" class="form-control "
                                        required placeholder="التكلفه">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> عدد طاولات الرفض</label>
                                    <input type="text" name="qty_refuse" value="{{ $item->qty_refuse }}"
                                        class="form-control " required placeholder="عدد طاولات الرفض">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اجمالي كميه الرفض</label>
                                    <input type="text" name="allqty_refuse" value="{{ $item->allqty_refuse }}"
                                        class="form-control " required placeholder="اجمالي كميه الرفض">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اجمالي قيمة الرفض</label>
                                    <input type="text" name="amount_refuse" value="{{ $item->amount_refuse }}"
                                        class="form-control " required placeholder="اجمالي قيمة الرفض">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> المتبقي من الطاولات</label>
                                    <input type="text" name="qty_found" value="{{ $item->qty_found }}"
                                        class="form-control " required placeholder="المتبقي من الطاولات">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اجمالي الكميه المتبقيه</label>
                                    <input type="text" name="qtyall_found" value="{{ $item->qtyall_found }}"
                                        class="form-control " required placeholder="اجمالي الكميه المتبقيه">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اجمالي قيمة المتبقي</label>
                                    <input type="text" name="amount_found" value="{{ $item->amount_found }}"
                                        class="form-control " required placeholder="اجمالي قيمة المتبقي">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الفرق بين الشراء والنشر قبل الخصم م3</label>
                                    <input type="text" name="import_miuns_publish_befor_discount"
                                        value="{{ $item->import_miuns_publish_befor_discount }}" class="form-control "
                                        required placeholder="الفرق بين الشراء والنشر قبل الخصم م3">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الفرق بين الشراء والنشر بعد الخصم م3</label>
                                    <input type="text" name="import_miuns_publish_after_discount"
                                        value="{{ $item->import_miuns_publish_after_discount }}" class="form-control "
                                        required placeholder="الفرق بين الشراء والنشر بعد الخصم م3">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الفرق بين النشر والتصنيع / التحميل م2</label>
                                    <input type="text" name="import_miuns_export" value="{{ $item->import_miuns_export }}"
                                        class="form-control " required placeholder="الفرق بين النشر والتصنيع / التحميل م2">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> صافي ربح البلوك</label>
                                    <input type="text" name="god" value="{{ $item->god }}" class="form-control "
                                        required placeholder="صافي الربح البلوك">
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label"> رقم الحاويه</label>
                                    <input type="text" name="number_hawya" value="{{ $item->number_hawya }}"
                                        class="form-control " required placeholder="رقم الحاويه">
                                </div>


                                <div class="form-group col-md-6 col-sm-6">
                                    <label class="control-label"> اسم المخزن</label>
                                    <select disabled name="store_id" class="form-control select2">
                                        @foreach ($store as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        تسجيل الفاتوره
                                    </button>
                                </div>
                            </div>

                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
