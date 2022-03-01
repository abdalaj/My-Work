@extends('layouts.app')
@section('title')
    تعديل هالك
@endsection
@section('header-link')
    <a href="{{ route('expire.create') }}"> تعديل هالك</a> / الهالكات
@endsection
@section('header-name')
    تعديل هالك
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل هالك</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('expire.update',$olddata->id ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> البيان</label>
                                <input type="text" value="{{ $olddata->name }}" name="name" class="form-control " required placeholder="البيان">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> المبلغ</label>
                                <input type="text" value="{{ $olddata->price }}" name="price" class="form-control price" required >
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> التاريخ</label>
                                <input type="date" value="{{ $olddata->date }}" name="date" class="form-control date" required >
                            </div>
                            <div class="form-group col-12 col-md-12 col-sm-12">
                                <label class="control-label">المخزن</label>
                                <select name="store" required class="form-control ">
                                        <option value="{{ $olddata->store }}">
                                            {{ $olddata->store }}
                                        </option>
                                </select>
                            </div>
                            <br>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">
                                    تسجيل الهالك
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
