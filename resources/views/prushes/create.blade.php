@extends('layouts.app')
@section('title')
    مصروف جديد
@endsection
@section('header-link')
    <a href="{{ route('prushes.create') }}">انشاء مصروف جديد</a> / المصروفات
@endsection
@section('header-name')
    مصروف جديد
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">انشاء مصروف</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('prushes.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="control-label"> اسم المصروف</label>
                                <input type="text" name="name" class="form-control " required placeholder="اسم المصروف">
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">
                                    تسجيل المصروف
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
