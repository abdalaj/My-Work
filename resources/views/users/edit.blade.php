@extends('layouts.app')
@section('title')
    تعديل المستخدمين
@endsection
@section('header-link')
    <a href=""> تعديل المستخدمين </a> / المستخدمين
@endsection
@section('header-name')
    تعديل المستخدمين
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل المستخدمين</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    @foreach ($data as $item)
                        <form action="{{ route('users.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-4">
                                    <label class="control-label"> الاسم</label>
                                    <input type="text" value="{{ $item->name }}" name="name" class="form-control "
                                         required placeholder="الاسم">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label">اسم المستخدم</label>
                                    <input type="text" value="{{ $item->email }}" name="email"
                                        class="form-control "  required placeholder="اسم المستخدم">
                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label"> كلمة السر</label>
                                    <input type="text" value="{{ $item->reminder }}" name="password" class="form-control"
                                         required placeholder="كلة السر">
                                </div>

                                <div class="form-group col-6">
                                    <label class="control-label"> المخزن</label>
                                    <select required name="store_id" class="form-control select2">
                                        @foreach ($store as $str)
                                            <option  {{$str->id==$item->store_id?'selected':''}} value="{{ $str->id }}">{{ $str->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <label class="control-label"> الخزنه</label>
                                    <select required name="bank_id" class="form-control select2">
                                        @foreach ($bank as $ban)
                                            <option  {{$ban->id==$item->store_id?'selected':''}} value="{{ $ban->id }}">{{ $ban->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        تعديل المستخدم
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
