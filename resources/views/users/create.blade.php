@extends('layouts.app')
@section('title')
    مستخدم جديد
@endsection
@section('header-link')
    <a href="{{ route('users.create') }}">انشاء مستخدم جديد</a> / المستخدمين
@endsection
@section('header-name')
    مستخدم جديد
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">انشاء مستخدم</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="control-label"> الاسم</label>
                                <input required type="text" name="name" class="form-control " placeholder="الاسم">
                            </div>

                            <div class="form-group col-4">
                                <label class="control-label">اسم المستخدم</label>
                                <input required type="text" name="email" class="form-control " placeholder="اسم المستخدم">
                            </div>
                            <div class="form-group col-4 " >
                                <label class="control-label"> كلمة السر</label>
                                <input required type="text" name="password" class="form-control " placeholder="كلمة السر">
                            </div>
                            <div class="form-group col-6">
                                <select required name="store_id" class="form-control select2">
                                    <option>المخزن</option>
                                    @foreach ($store as $str)
                                        <option value="{{$str->id}}">{{$str->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <select required name="bank_id" class="form-control select2">
                                    <option>الخزنه</option>
                                    @foreach ($bank as $ban)
                                        <option value="{{$ban->id}}">{{$ban->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">
                                    تسجيل المستخدم
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

