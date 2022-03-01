@extends('layouts.app')
@section('title')
مورد او عميل جديد
@endsection
@section('header-link')
<a href="{{ route('supplier.create') }}">انشاء مورد او عميل جديد</a> / الموردين والعملاء
@endsection
@section('header-name')
مورد او عميل جديد
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title">انشاء مورد او عميل</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('supplier.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="control-label" > الاسم</label>
                                <input type="text" name="name" class="form-control "  placeholder="الاسم">
                              </div>

                              <div class="form-group col-4">
                                <label class="control-label" > رقم الهاتف</label>
                                <input type="text" name="number_phone" class="form-control "  placeholder="رقم الهاتف">
                              </div>
                              <div class="form-group col-4">
                                <label class="control-label" > العنوان</label>
                                <input type="text" name="address" class="form-control "  placeholder="العنوان">
                              </div>

                              <div class="form-group col-6">
                                <label class="control-label" > النوع</label>
                                <select name="type" class="form-control select2 type">
                                    <option selected value="مورد">مورد</option>
                                    <option value="عميل">عميل</option>
                                </select>
                              </div>
                              <div class="form-group col-6 code" style="display: none">
                                <label class="control-label" > كود العميل</label>
                                <input type="text" name="code" class="form-control "  placeholder="كود العميل">
                              </div>
                              <input type="hidden" name="whoadd" value="{{ Auth::user()->name!=false?Auth::user()->name:'' }}">

                              <div class="col-12">
                                  <button class="btn btn-primary w-100" type="submit">
                                      تسجيل
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
            $(".type").change(function(){
                if ($(".type option:selected").val()=="عميل") {
                    $(".code").show();
                }else{
                    $(".code").hide();
                }
            })
        });
    </script>
@endsection
