@extends('layouts.app')
@section('title')
    مخزن جديد
@endsection
@section('header-link')
    <a href="{{ route('store.create') }}">انشاء مخزن جديد</a> / المخازن
@endsection
@section('header-name')
    مخزن جديد
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">انشاء مخزن</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label class="control-label"> الاسم</label>
                                <input type="text" name="name" class="form-control " required placeholder="الاسم">
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">
                                    تسجيل المخزن
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
