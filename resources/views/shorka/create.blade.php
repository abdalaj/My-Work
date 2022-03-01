@extends('layouts.app')
@section('title')
    شريك جديد
@endsection
@section('header-link')
    <a href="{{ route('shorka.create') }}">انشاء شريك جديد</a> / الشركاء
@endsection
@section('header-name')
    شريك جديد
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">انشاء شريك</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('shorka.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> الاسم</label>
                                <input type="text" name="name" class="form-control " required placeholder="الاسم">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> النسبه</label>
                                <input type="text" name="prec" class="form-control salery" required placeholder="النسبه">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label">المبلغ</label>
                                <input type="text" name="amount" placeholder="المبلغ" required class="form-control ">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">
                                    تسجيل الشريك
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
