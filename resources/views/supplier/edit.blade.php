@extends('layouts.app')
@section('title')
    تعديل الموردين والعملاء
@endsection
@section('header-link')
    <a href=""> تعديل الموردين والعملاء </a> / الموردين والعملاء
@endsection
@section('header-name')
    تعديل الموردين والعملاء
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل الموردين والعملاء</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    @foreach ($data as $item)
                        <form action="{{ route('supplier.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-4">
                                    <label class="control-label"> الاسم</label>
                                    <input type="text" value="{{ $item->name }}" name="name" class="form-control "
                                        required placeholder="الاسم">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> رقم الهاتف</label>
                                    <input type="text" value="{{ $item->number_phone }}" name="number_phone"
                                        class="form-control " required placeholder="رقم الهاتف">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> العنوان</label>
                                    <input type="text" value="{{ $item->address }}" name="address" class="form-control "
                                        required placeholder="العنوان">
                                </div>
                                @if ($item->type == 'عميل')
                                    <div class="form-group col-6">
                                        <label class="control-label"> كود العميل</label>
                                        <input type="text" value="{{ $item->code }}" name="code" class="form-control "
                                            required placeholder="كود العميل">
                                    </div>
                                @endif
                                <div class="form-group col-6">
                                    <label class="control-label"> النوع</label>
                                    <select disabled name="type" class="form-control select2">
                                        <option value="{{ $item->type }}">{{ $item->type }}</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        تعديل
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
@section('opration')
    المورد
@endsection
