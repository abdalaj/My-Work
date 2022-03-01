@extends('layouts.app')
@section('title')
    تعديل الخزنه
@endsection
@section('header-link')
    <a href=""> تعديل الخزنه</a> / الخزنه
@endsection
@section('header-name')
    تعديل الخزنه
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل الخزنه</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    @foreach ($data as $item)
                        <form action="{{ route('bank.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label class="control-label"> الاسم</label>
                                    <input type="text" value="{{ $item->name }}" name="name" class="form-control "
                                        required placeholder="الاسم">
                                </div>
                                <div class="form-group col-12">
                                    <label class="control-label"> الرصيد</label>
                                    <input type="text" value="{{ $item->amount }}" name="amount" class="form-control "
                                        required placeholder="الرصيد">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        تعديل الخزنه
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
    الخزنه
@endsection
