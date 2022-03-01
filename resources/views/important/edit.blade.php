@extends('layouts.app')
@section('title')
    تعديل فاتورة توريد
@endsection
@section('header-link')
    <a href=""> تعديل فاتورة توريد</a> / التوريدات
@endsection
@section('header-name')
    تعديل فاتورة توريد
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

                    @foreach ($important as $item)
                        <form action="{{ route('important.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> البيان</label>
                                    <input type="text" value="{{ $item->name }}" name="name" class="form-control "
                                        placeholder="اسم البيان">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الرقم الحرفي</label>
                                    <select style="text-transform: capitalize" name="number_herfy"
                                        class="form-control select2">
                                        @php
                                            $arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
                                        @endphp
                                        @for ($i = 0; $i < count($arr); $i++)
                                            <option value={{ $arr[$i] }}>{{ $arr[$i] }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> رقم المصنع</label>
                                    <input type="text" value="{{ $item->number_factory }}" name="number_factory"
                                        class="form-control " placeholder="رقم المصنع">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> رقم العميل</label>
                                    <input type="text" value="{{ $item->number_client }}" name="number_client"
                                        class="form-control " placeholder="رقم العميل">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> اسم العميل</label>
                                    <select name="name_client" class="form-control selec2">
                                        @foreach ($supplier as $sup)
                                            <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الكميه</label>
                                    <input type="text" value="{{ $item->qty }}" name="qty" class="form-control "
                                        placeholder="الكميه">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الطول</label>
                                    <input type="text" value="{{ $item->height }}" name="height" class="form-control "
                                        placeholder="الطول">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> العرض</label>
                                    <input type="text" value="{{ $item->width }}" name="width" class="form-control "
                                        placeholder="العرض">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الارتفاع</label>
                                    <input type="text" value="{{ $item->volum }}" name="volum" class="form-control "
                                        placeholder="الارتفاع">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الصافي</label>
                                    <input type="text" value="{{ $item->safy }}" name="safy" class="form-control "
                                        placeholder="الصافي">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الخصم</label>
                                    <input type="text" value="{{ $item->discount }}" name="discount" class="form-control "
                                        placeholder="الخصم">
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label class="control-label"> الصافي بعد الخصم</label>
                                    <input type="text" value="{{ $item->safy_after }}" name="safy_after"
                                        class="form-control " placeholder="الصافي بعد الخصم">
                                </div>
                                <div class="form-group col-md-4 col-sm-6">
                                    <label class="control-label"> السعر</label>
                                    <input type="text" value="{{ $item->price }}" name="price" class="form-control "
                                        placeholder="السعر">
                                </div>
                                <div class="form-group col-md-4 col-sm-6">
                                    <label class="control-label"> الاجمالي</label>
                                    <input type="text" value="{{ $item->amount }}" name="amount" class="form-control "
                                        placeholder="الاجمالي">
                                </div>
                                <div class="form-group col-md-4 col-sm-6">
                                    <label class="control-label"> اسم المخزن</label>
                                    <select name="store_id" disabled class="form-control select2">
                                        @foreach ($store as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        تعديل الفاتوره
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
