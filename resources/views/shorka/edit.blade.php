@extends('layouts.app')
@section('title')
    تعديل شريك
@endsection
@section('header-link')
    <a href="{{ route('shorka.create') }}">تعديل شريك </a> / الشركاء
@endsection
@section('header-name')
    تعديل شريك
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل شريك</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($data as $item)
                        <form action="{{ route('shorka.update',$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-6 col-md-4 col-sm-12">
                                    <label class="control-label"> الاسم</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control " required placeholder="الاسم">
                                </div>
                                <div class="form-group col-6 col-md-4 col-sm-12">
                                    <label class="control-label"> النسبه</label>
                                    <input type="text" name="prec" value="{{ $item->prec }}" class="form-control salery" required placeholder="النسبه">
                                </div>
                                <div class="form-group col-6 col-md-4 col-sm-12">
                                    <label class="control-label">المبلغ</label>
                                    <input type="text" name="amount" value="{{ $item->amount }}" placeholder="المبلغ" required class="form-control ">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        تسجيل الشريك
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

