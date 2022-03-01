@extends('layouts.app')
@section('title')
    تعديل مصروف
@endsection
@section('header-link')
    <a href="{{ route('prushes.create') }}"> تعديل مصروف</a> / المصروفات
@endsection
@section('header-name')
    تعديل مصروف
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل مصروف</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($data as $d)
                        <form action="{{ route('prushes.update',$d->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                    <div class="form-group col-12">
                                        <label class="control-label"> اسم المصروف</label>
                                        <input type="text" value="{{ $d->name }}" name="name" class="form-control " required placeholder="اسم المصروف">
                                    </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        تسجيل المصروف
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
