@extends('layouts.app')
@section('title')
    فاتورة نشر و صرف
@endsection
@section('header-link')
    <a href="">تعديل فاتورة نشر و صرف</a> / النشر و الصرف
@endsection
@section('header-name')
    فاتورة نشر و صرف
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
                    @foreach ($publisher as $item)
                        <form action="{{ route('publisher.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اسم العميل</label>
                                    <select name="name_client" class="form-control">
                                        @foreach ($client as $cli)
                                            <option value="{{ $cli->id }}">{{ $cli->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> البيان</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control "
                                        placeholder="اسم البيان">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> عدد بلوكات النشر </label>
                                    <input type="text" name="qty_publish" value="{{ $item->qty_publish }}"
                                        class="form-control " placeholder="عدد بلوكات النشر">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> رقم الماكينه</label>
                                    <input type="text" name="number_makina" value="{{ $item->number_makina }}"
                                        class="form-control " placeholder="رقم الماكينه">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> سمك الالماظ</label>
                                    <input type="text" name="volum_almaza" value="{{ $item->volum_almaza }}"
                                        class="form-control " placeholder="سمك الالماظ">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> سمك النشر</label>
                                    <input type="text" name="volum_publish" value="{{ $item->volum_publish }}"
                                        class="form-control " placeholder="سمك النشر">
                                </div>
                                <div class="form-group col-3">
                                    <label class="control-label"> اجمالي السمك</label>
                                    <input type="text" name="volum_amount" value="{{ $item->volum_amount }}"
                                        class="form-control " placeholder="اجمالي السمك">
                                </div>
                                <div class="form-group col-3">
                                    <label class="control-label"> عدد المسحات</label>
                                    <input type="text" name="number_smears" value="{{ $item->number_smears }}"
                                        class="form-control " placeholder="عدد المسحات">
                                </div>
                                <div class="form-group col-3">
                                    <label class="control-label"> عدد الطاولات</label>
                                    <input type="text" name="number_tables" value="{{ $item->number_tables }}"
                                        class="form-control " placeholder="عدد الطاولات">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الطول</label>
                                    <input type="text" name="height" value="{{ $item->height }}" class="form-control "
                                        placeholder="الطول">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> العرض</label>
                                    <input type="text" name="width" value="{{ $item->width }}" class="form-control "
                                        placeholder="العرض">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الارتفاع</label>
                                    <input type="text" name="volum" value="{{ $item->volum }}" class="form-control "
                                        placeholder="الارتفاع">
                                </div>
                                <div class="form-group col-3">
                                    <label class="control-label"> الصافي م3</label>
                                    <input type="text" name="safy" value="{{ $item->safy }}" class="form-control "
                                        placeholder="الصافي م3">
                                </div>
                                <div class="form-group col-3">
                                    <label class="control-label"> السعر</label>
                                    <input type="text" name="price" value="{{ $item->price }}" class="form-control "
                                        placeholder="السعر">
                                </div>
                                <div class="form-group col-3">
                                    <label class="control-label"> قيمة ال م3</label>
                                    <input type="text" name="amount" value="{{ $item->amount }}" class="form-control "
                                        placeholder="قيمة ال م3">
                                </div>

                                <div class="form-group col-3">
                                    <label class="control-label"> سعر المسحه</label>
                                    <input type="text" name="price_mears" value="{{ $item->price_mears }}"
                                        class="form-control " placeholder="سعر المسحه">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> قيمة المسحه</label>
                                    <input type="text" name="amount_mears" value="{{ $item->amount_mears }}"
                                        class="form-control " placeholder="قيمة المسحه">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اكرامية</label>
                                    <input type="text" name="tip" value="{{ $item->tip }}" class="form-control "
                                        placeholder="اكرامية">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اجمالي القيمه</label>
                                    <input type="text" name="amount_all" value="{{ $item->amount_all }}"
                                        class="form-control " placeholder="اجمالي القيمه">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> تكلفة النقل</label>
                                    <input type="text" name="price_charge" value="{{ $item->price_charge }}"
                                        class="form-control " placeholder="تكلفة النقل">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اجمالي التكلفه</label>
                                    <input type="text" name="amount_all_plus" value="{{ $item->amount_all_plus }}"
                                        class="form-control " placeholder="اجمالي التكلفه">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> صافي م2</label>
                                    <input type="text" name="safym2" value="{{ $item->safym2 }}" class="form-control "
                                        placeholder="صافي م2">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> تكلفة م2 بعد النشر</label>
                                    <input type="text" name="amount_with_safym2" value="{{ $item->amount_with_safym2 }}"
                                        class="form-control " placeholder="تكلفة م2 بعد النشر">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اسم المخزن</label>
                                    <select name="store_id" disabled class="form-control select2">
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
