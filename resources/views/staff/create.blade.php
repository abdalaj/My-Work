@extends('layouts.app')
@section('title')
    موظف جديد
@endsection
@section('header-link')
    <a href="{{ route('staff.create') }}">انشاء موظف جديد</a> / الموظفين
@endsection
@section('header-name')
    موظف جديد
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">انشاء موظف</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('staff.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> الاسم</label>
                                <input type="text" name="name" class="form-control " required placeholder="الاسم">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control " required placeholder="رقم الهاتف">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> الوظيفة</label>
                                <input type="text" name="type" class="form-control " required placeholder="الوظيفة">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> الراتب</label>
                                <input type="text" name="salery" class="form-control salery" required placeholder="الراتب">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label"> عدد ايام العمل</label>
                                <input type="text" name="days" class="form-control days" required placeholder="عدد ايام العمل">
                            </div>
                            <div class="form-group col-6 col-md-4 col-sm-12">
                                <label class="control-label">الراتب اليومي</label>
                                <input  type="text" name="salery_days" class="form-control salery_days"  placeholder="الراتب اليومي">
                            </div>
                            <div class="form-group col-6 col-12">
                                <label class="control-label">تاريخ بداية العمل</label>
                                <input  type="date" name="date" class="form-control"  placeholder="تاريخ بداية العمل">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label">ملاحظات</label>
                                <textarea style="resize: none" name="notes" class="form-control " ></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">
                                    تسجيل الموظف
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            $(".salery,.days").keyup(function(){
                var salery = $(".salery").val();
                var days = $(".days").val();
                var calc = parseFloat(salery/days).toFixed(2);
                $(".salery_days").val(calc);
            });
        })
    </script>
@endsection
